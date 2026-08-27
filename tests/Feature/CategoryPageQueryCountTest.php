<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Laragento\Models\CatalogCategoryProduct;
use Tests\TestCase;

/**
 * Regression test for a real N+1 query bug: the category grid used to call
 * EavFlattener::flattenProduct() once per product (up to 5 queries each),
 * so a 12-product page fired 60+ queries. CategoryController now batches
 * that into flattenProducts(), so the query count must stay flat
 * regardless of how many products are on the page.
 */
class CategoryPageQueryCountTest extends TestCase
{
    public function test_category_page_query_count_does_not_scale_with_product_count(): void
    {
        $this->skipUnlessDatabaseReachable();

        $categoryId = CatalogCategoryProduct::query()
            ->selectRaw('category_id, COUNT(*) as product_count')
            ->groupBy('category_id')
            ->havingRaw('COUNT(*) >= 5')
            ->orderByDesc('product_count')
            ->value('category_id');

        if ($categoryId === null) {
            $this->markTestSkipped('No category with at least 5 products in this database.');
        }

        DB::enableQueryLog();
        $this->get("/category/{$categoryId}")->assertOk();
        $queryCount = count(DB::getQueryLog());
        DB::disableQueryLog();

        // A fixed, small number of queries regardless of grid size: one per
        // EAV value table (x2, for the category name and the product grid),
        // plus count/pagination/lookup queries -- not "5 x number of
        // products on the page", which is what an N+1 would produce.
        $this->assertLessThan(20, $queryCount, "expected a bounded query count, got {$queryCount} -- possible N+1 regression");
    }
}
