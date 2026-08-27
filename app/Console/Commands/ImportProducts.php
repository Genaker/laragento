<?php

namespace App\Console\Commands;

use App\Support\EavFlattener;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Laragento\Models\EavAttribute;

/**
 * A Magmi-style bulk product importer -- batched Eloquent `insert()`/
 * `upsert()`, never a per-row `Model::save()`. This is the same shape
 * (and the same fix) as every other importer in this benchmark family
 * (GoGento, gogento-rust, the plain-PDO/Magento-model PHP scripts): parse
 * CSV, resolve SKUs, bulk-insert new entities, bucket attribute values by
 * backend_type, and batch-upsert each of the 5 EAV value tables inside one
 * transaction per table.
 *
 * `Builder::upsert()` is the Eloquent-idiomatic way to express
 * `INSERT ... ON DUPLICATE KEY UPDATE` -- it is not a hand-rolled SQL
 * string, it is the query builder's own bulk-upsert API (Laravel 8+).
 */
class ImportProducts extends Command
{
    protected $signature = 'magmi:import
        {file : Path to the CSV file to import}
        {--batch-size=500 : Rows per batched insert/upsert statement}
        {--store=0 : Store ID to write EAV values under}
        {--attribute-set=4 : attribute_set_id assigned to newly created products}';

    protected $description = 'Magmi-style bulk product import from CSV (batched Eloquent insert/upsert, not per-row model saves)';

    private const VALUE_TABLES = [
        'varchar' => 'catalog_product_entity_varchar',
        'int' => 'catalog_product_entity_int',
        'decimal' => 'catalog_product_entity_decimal',
        'text' => 'catalog_product_entity_text',
        'datetime' => 'catalog_product_entity_datetime',
    ];

    public function handle(): int
    {
        $path = $this->argument('file');
        $batchSize = max(1, (int) $this->option('batch-size'));
        $storeId = (int) $this->option('store');
        $attributeSetId = (int) $this->option('attribute-set');

        if (! is_readable($path)) {
            $this->error("failed to open {$path}");

            return self::FAILURE;
        }
        $handle = fopen($path, 'r');

        $header = fgetcsv($handle, 0, ',', '"', '\\');
        if ($header === false) {
            $this->error('empty CSV');

            return self::FAILURE;
        }
        $skuCol = array_search('sku', $header, true);
        if ($skuCol === false) {
            $this->error("CSV must contain a 'sku' column");

            return self::FAILURE;
        }
        $typeCol = array_search('type_id', $header, true);

        $totalStart = microtime(true);
        $processStart = microtime(true);

        $csvRows = [];
        while (($row = fgetcsv($handle, 0, ',', '"', '\\')) !== false) {
            $csvRows[] = $row;
        }
        fclose($handle);
        $totalRows = count($csvRows);

        $attrs = EavAttribute::where('entity_type_id', EavFlattener::PRODUCT_ENTITY_TYPE_ID)
            ->whereIn('backend_type', array_keys(self::VALUE_TABLES))
            ->get(['attribute_id', 'attribute_code', 'backend_type'])
            ->keyBy('attribute_code');

        $skuType = [];
        $skus = [];
        foreach ($csvRows as $row) {
            $sku = trim((string) ($row[$skuCol] ?? ''));
            if ($sku === '') {
                continue;
            }
            $skus[] = $sku;
            if (! isset($skuType[$sku])) {
                $skuType[$sku] = ($typeCol !== false && ($row[$typeCol] ?? '') !== '') ? $row[$typeCol] : 'simple';
            }
        }
        $skus = array_values(array_unique($skus));
        $processTime = microtime(true) - $processStart;

        $dbStart = microtime(true);
        $skuToId = $this->lookupExistingSkus($skus, $batchSize);
        $updatedCount = 0;
        foreach (array_keys($skuType) as $sku) {
            if (isset($skuToId[$sku])) {
                $updatedCount++;
            }
        }

        $newEntries = [];
        foreach ($skuType as $sku => $typeId) {
            if (! isset($skuToId[$sku])) {
                $newEntries[] = ['sku' => $sku, 'type_id' => $typeId];
            }
        }
        $createdCount = count($newEntries);
        if (! empty($newEntries)) {
            $skuToId += $this->insertNewProducts($newEntries, $attributeSetId, $batchSize);
        }

        $buckets = array_fill_keys(array_keys(self::VALUE_TABLES), []);
        foreach ($csvRows as $row) {
            $sku = trim((string) ($row[$skuCol] ?? ''));
            if ($sku === '' || ! isset($skuToId[$sku])) {
                continue;
            }
            $entityId = $skuToId[$sku];
            foreach ($header as $colIndex => $code) {
                $attr = $attrs->get($code);
                if ($attr === null) {
                    continue;
                }
                $value = $row[$colIndex] ?? '';
                if ($value === '') {
                    continue;
                }
                $buckets[$attr->backend_type][] = [
                    'entity_id' => $entityId,
                    'attribute_id' => $attr->attribute_id,
                    'store_id' => $storeId,
                    'value' => $value,
                ];
            }
        }

        foreach (self::VALUE_TABLES as $type => $table) {
            $this->upsertEavTable($table, $buckets[$type], $batchSize);
        }
        $dbTime = microtime(true) - $dbStart;
        $totalTime = microtime(true) - $totalStart;

        $eavTotal = array_sum(array_map('count', $buckets));

        $this->info('=== Laravel (Magmi-style) Import Performance ===');
        $this->line("Rows in CSV:    {$totalRows}");
        $this->line("Products:       {$createdCount} created, {$updatedCount} updated");
        $this->line(sprintf(
            'EAV rows:       %d (varchar=%d int=%d decimal=%d text=%d datetime=%d)',
            $eavTotal,
            count($buckets['varchar']),
            count($buckets['int']),
            count($buckets['decimal']),
            count($buckets['text']),
            count($buckets['datetime'])
        ));
        $this->line(sprintf('Total time:     %.3fs', $totalTime));
        $this->line(sprintf('  - Processing: %.3fs', $processTime));
        $this->line(sprintf('  - DB time:    %.3fs', $dbTime));
        $this->line('=================================================');

        return self::SUCCESS;
    }

    /** @param string[] $skus @return array<string,int> sku -> entity_id */
    private function lookupExistingSkus(array $skus, int $batchSize): array
    {
        $map = [];
        foreach (array_chunk($skus, $batchSize) as $chunk) {
            $rows = DB::table('catalog_product_entity')
                ->whereIn('sku', $chunk)
                ->pluck('entity_id', 'sku');
            foreach ($rows as $sku => $entityId) {
                $map[$sku] = (int) $entityId;
            }
        }

        return $map;
    }

    /**
     * Bulk-inserts new entities, relying on MySQL/InnoDB's consecutive-
     * auto-increment-lock guarantee for a multi-row insert -- the same
     * trick every other importer in this project's benchmark family uses.
     *
     * @param  array<int,array{sku:string,type_id:string}>  $entries
     * @return array<string,int> sku -> entity_id
     */
    private function insertNewProducts(array $entries, int $attributeSetId, int $batchSize): array
    {
        $map = [];
        foreach (array_chunk($entries, $batchSize) as $chunk) {
            $rows = array_map(
                fn (array $e) => ['attribute_set_id' => $attributeSetId, 'type_id' => $e['type_id'], 'sku' => $e['sku']],
                $chunk
            );
            DB::table('catalog_product_entity')->insert($rows);
            $firstId = (int) DB::connection()->getPdo()->lastInsertId();
            foreach ($chunk as $i => $entry) {
                $map[$entry['sku']] = $firstId + $i;
            }
        }

        return $map;
    }

    /**
     * Batched upsert into one of the 5 EAV value tables via Eloquent's
     * `upsert()` -- the query-builder-native `INSERT ... ON DUPLICATE KEY
     * UPDATE` -- one explicit transaction wrapping every chunk (the same
     * per-chunk-autocommit fix this project's Go and Rust importers both
     * needed; see the top-level gogento-rust README's benchmark section).
     *
     * @param  array<int,array{entity_id:int,attribute_id:int,store_id:int,value:mixed}>  $rows
     */
    private function upsertEavTable(string $table, array $rows, int $batchSize): void
    {
        if (empty($rows)) {
            return;
        }
        DB::transaction(function () use ($table, $rows, $batchSize) {
            foreach (array_chunk($rows, $batchSize) as $chunk) {
                DB::table($table)->upsert($chunk, ['entity_id', 'attribute_id', 'store_id'], ['value']);
            }
        });
    }
}
