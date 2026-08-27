<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * Flattens a product or category entity's EAV attribute values into a
 * plain associative array -- the same "join five value tables into one
 * flat map" concept this project's Go and Rust reimplementations both
 * build their repository layers around, expressed here as Eloquent query
 * builder calls instead of hand-written SQL joins.
 *
 * Scoped to a fixed set of attribute codes per entity type rather than
 * joining "every attribute this entity has" -- fetching every EAV value a
 * real Magento product carries (which can be 50+) for a storefront page
 * that only ever displays a handful of them would be pure waste.
 */
class EavFlattener
{
    public const PRODUCT_ENTITY_TYPE_ID = 4;

    public const CATEGORY_ENTITY_TYPE_ID = 3;

    private const VALUE_TABLES = [
        'varchar' => 'catalog_product_entity_varchar',
        'int' => 'catalog_product_entity_int',
        'decimal' => 'catalog_product_entity_decimal',
        'text' => 'catalog_product_entity_text',
        'datetime' => 'catalog_product_entity_datetime',
    ];

    private const CATEGORY_VALUE_TABLES = [
        'varchar' => 'catalog_category_entity_varchar',
        'int' => 'catalog_category_entity_int',
        'decimal' => 'catalog_category_entity_decimal',
        'text' => 'catalog_category_entity_text',
        'datetime' => 'catalog_category_entity_datetime',
    ];

    /** @return array<string,int> attribute_code -> attribute_id, cached per process */
    private static function attributeIds(int $entityTypeId, array $codes): array
    {
        static $cache = [];
        $key = $entityTypeId.':'.implode(',', $codes);
        if (isset($cache[$key])) {
            return $cache[$key];
        }

        $rows = Cache::remember(
            "eav_attribute_ids:{$key}",
            now()->addMinutes(30),
            fn () => DB::table('eav_attribute')
                ->where('entity_type_id', $entityTypeId)
                ->whereIn('attribute_code', $codes)
                ->pluck('attribute_id', 'attribute_code')
                ->map(fn ($id) => (int) $id)
                ->all()
        );

        return $cache[$key] = $rows;
    }

    /**
     * @param  string[]  $codes  attribute codes to fetch, e.g. ['name', 'price']
     * @return array<string,mixed> attribute_code -> value (missing codes are simply absent)
     */
    public static function flattenProduct(int $entityId, array $codes, int $storeId = 0): array
    {
        return self::flattenProducts([$entityId], $codes, $storeId)[$entityId] ?? [];
    }

    /** @param string[] $codes */
    public static function flattenCategory(int $entityId, array $codes, int $storeId = 0): array
    {
        return self::flatten(self::CATEGORY_ENTITY_TYPE_ID, self::CATEGORY_VALUE_TABLES, [$entityId], $codes, $storeId)[$entityId] ?? [];
    }

    /**
     * Batch variant of `flattenProduct()` -- one query per value table for
     * the whole `$entityIds` set instead of one query per table *per
     * product*. Use this for anything that renders more than one product
     * (a category grid, a related-products block); calling
     * `flattenProduct()` in a loop over N products is an N+1 query bug,
     * not a style choice.
     *
     * @param  int[]  $entityIds
     * @param  string[]  $codes
     * @return array<int,array<string,mixed>> entity_id -> (attribute_code -> value)
     */
    public static function flattenProducts(array $entityIds, array $codes, int $storeId = 0): array
    {
        return self::flatten(self::PRODUCT_ENTITY_TYPE_ID, self::VALUE_TABLES, $entityIds, $codes, $storeId);
    }

    /**
     * @param  string[]  $codes
     * @param  array<string,string>  $tables  backend_type -> table
     * @param  int[]  $entityIds
     * @return array<int,array<string,mixed>> entity_id -> (attribute_code -> value)
     */
    private static function flatten(int $entityTypeId, array $tables, array $entityIds, array $codes, int $storeId): array
    {
        $result = array_fill_keys($entityIds, []);
        if (empty($entityIds)) {
            return $result;
        }

        $attributeIds = self::attributeIds($entityTypeId, $codes);
        if (empty($attributeIds)) {
            return $result;
        }
        $idToCode = array_flip($attributeIds);

        foreach ($tables as $table) {
            $rows = DB::table($table)
                ->whereIn('entity_id', $entityIds)
                ->whereIn('attribute_id', array_values($attributeIds))
                ->whereIn('store_id', [0, $storeId])
                ->orderBy('store_id')
                ->get(['entity_id', 'attribute_id', 'store_id', 'value']);

            // Store 0 (default) first, then the requested store overlays it --
            // last-writer-wins on a store-specific override, same precedence
            // Magento's own EAV read path uses.
            foreach ($rows as $row) {
                $code = $idToCode[(int) $row->attribute_id] ?? null;
                if ($code !== null) {
                    $result[(int) $row->entity_id][$code] = $row->value;
                }
            }
        }

        return $result;
    }
}
