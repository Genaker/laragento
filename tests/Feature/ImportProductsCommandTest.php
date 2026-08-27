<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ImportProductsCommandTest extends TestCase
{
    private const SKU_PREFIX = 'LARAGENTO-TEST-';

    private const FIXTURE = __DIR__.'/../fixtures/synthetic_products.csv';

    protected function setUp(): void
    {
        parent::setUp();
        $this->skipUnlessDatabaseReachable();
        $this->deleteFixtureProducts();
    }

    protected function tearDown(): void
    {
        $this->deleteFixtureProducts();
        parent::tearDown();
    }

    public function test_import_creates_products_and_eav_values(): void
    {
        $this->artisan('magmi:import', ['file' => self::FIXTURE])
            ->assertExitCode(0);

        $count = DB::table('catalog_product_entity')->where('sku', 'like', self::SKU_PREFIX.'%')->count();
        $this->assertSame(20, $count, 'all 20 fixture rows should have been created');

        $name = DB::table('catalog_product_entity_varchar as v')
            ->join('catalog_product_entity as p', 'p.entity_id', '=', 'v.entity_id')
            ->join('eav_attribute as a', 'a.attribute_id', '=', 'v.attribute_id')
            ->where('p.sku', self::SKU_PREFIX.'0000')
            ->where('a.attribute_code', 'name')
            ->value('v.value');
        $this->assertSame('Laragento Test Product 0', $name);
    }

    public function test_reimport_updates_in_place_instead_of_duplicating(): void
    {
        $this->artisan('magmi:import', ['file' => self::FIXTURE])->assertExitCode(0);
        $firstRunVarcharCount = DB::table('catalog_product_entity_varchar as v')
            ->join('catalog_product_entity as p', 'p.entity_id', '=', 'v.entity_id')
            ->where('p.sku', 'like', self::SKU_PREFIX.'%')
            ->count();

        $this->artisan('magmi:import', ['file' => self::FIXTURE])->assertExitCode(0);
        $secondRunVarcharCount = DB::table('catalog_product_entity_varchar as v')
            ->join('catalog_product_entity as p', 'p.entity_id', '=', 'v.entity_id')
            ->where('p.sku', 'like', self::SKU_PREFIX.'%')
            ->count();

        $productCount = DB::table('catalog_product_entity')->where('sku', 'like', self::SKU_PREFIX.'%')->count();

        $this->assertSame(20, $productCount, 'second import must not create duplicate entities');
        $this->assertSame($firstRunVarcharCount, $secondRunVarcharCount, 'upsert must update rows in place, not insert duplicates');
    }

    public function test_missing_file_fails_cleanly(): void
    {
        $this->artisan('magmi:import', ['file' => '/nonexistent/path.csv'])
            ->assertExitCode(1);
    }

    private function deleteFixtureProducts(): void
    {
        $ids = DB::table('catalog_product_entity')->where('sku', 'like', self::SKU_PREFIX.'%')->pluck('entity_id');
        if ($ids->isEmpty()) {
            return;
        }
        foreach (['varchar', 'int', 'decimal', 'text', 'datetime'] as $type) {
            DB::table("catalog_product_entity_{$type}")->whereIn('entity_id', $ids)->delete();
        }
        DB::table('catalog_product_entity')->whereIn('entity_id', $ids)->delete();
    }
}
