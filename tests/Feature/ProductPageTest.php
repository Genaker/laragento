<?php

namespace Tests\Feature;

use Laragento\Models\CatalogProductEntity;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    public function test_known_product_renders_its_details(): void
    {
        $this->skipUnlessDatabaseReachable();

        $product = CatalogProductEntity::query()->orderBy('entity_id')->first();
        if ($product === null) {
            $this->markTestSkipped('No products exist in this database.');
        }

        $response = $this->get("/product/{$product->entity_id}");

        $response->assertOk();
        $response->assertViewIs('product');
        $response->assertViewHas('sku', $product->sku);
    }

    public function test_unknown_product_is_404(): void
    {
        $this->skipUnlessDatabaseReachable();

        $response = $this->get('/product/999999999');

        $response->assertNotFound();
    }
}
