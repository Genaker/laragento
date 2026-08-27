<?php

namespace Tests\Feature;

use Laragento\Models\CatalogCategoryProduct;
use Tests\TestCase;

class CategoryPageTest extends TestCase
{
    public function test_known_category_renders_a_product_grid(): void
    {
        $this->skipUnlessDatabaseReachable();

        $categoryId = CatalogCategoryProduct::query()
            ->selectRaw('category_id, COUNT(*) as product_count')
            ->groupBy('category_id')
            ->orderByDesc('product_count')
            ->value('category_id');

        if ($categoryId === null) {
            $this->markTestSkipped('No category has any products assigned in this database.');
        }

        $response = $this->get("/category/{$categoryId}");

        $response->assertOk();
        $response->assertViewIs('category');
        $response->assertViewHas('products');
    }

    public function test_unknown_category_is_404(): void
    {
        $this->skipUnlessDatabaseReachable();

        $response = $this->get('/category/999999999');

        $response->assertNotFound();
    }

    public function test_non_numeric_category_id_is_404(): void
    {
        $this->skipUnlessDatabaseReachable();

        $response = $this->get('/category/not-a-number');

        $response->assertNotFound();
    }
}
