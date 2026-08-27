<?php

namespace Tests\Feature;

use Laragento\Models\CatalogCategoryEntity;
use Laragento\Models\CatalogCategoryProduct;
use Laragento\Models\CataloginventoryStockItem;
use Laragento\Models\CatalogProductEntity;
use Laragento\Models\CatalogProductIndexPrice;
use Laragento\Models\EavAttribute;
use Tests\TestCase;

/**
 * Sanity coverage for the core Laragento model library against a real
 * Magento database -- the library predates this test suite (see the
 * top-level README), so this locks in that its table/primary-key/cast
 * mappings still match the real schema rather than only ever being
 * checked by hand.
 */
class CoreModelsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->skipUnlessDatabaseReachable();
    }

    public function test_catalog_product_entity_maps_the_real_table(): void
    {
        $this->assertSame('catalog_product_entity', (new CatalogProductEntity)->getTable());
        $this->assertGreaterThan(0, CatalogProductEntity::count());
    }

    public function test_catalog_category_entity_maps_the_real_table(): void
    {
        $this->assertSame('catalog_category_entity', (new CatalogCategoryEntity)->getTable());
        $this->assertGreaterThan(0, CatalogCategoryEntity::count());
    }

    public function test_eav_attribute_maps_the_real_table(): void
    {
        $this->assertSame('eav_attribute', (new EavAttribute)->getTable());
        $nameAttribute = EavAttribute::where('entity_type_id', 4)->where('attribute_code', 'name')->first();
        $this->assertNotNull($nameAttribute, "the 'name' product attribute must exist in a real Magento install");
        $this->assertSame('varchar', $nameAttribute->backend_type);
    }

    public function test_cataloginventory_stock_item_row_count_matches_products(): void
    {
        // Every product gets exactly one default-scope stock row in a
        // standard Magento install -- a mismatch here would mean either
        // model is pointed at the wrong table/column.
        $this->assertSame(CatalogProductEntity::count(), CataloginventoryStockItem::count());
    }

    public function test_catalog_product_index_price_has_a_composite_primary_key(): void
    {
        $price = CatalogProductIndexPrice::query()->first();
        if ($price === null) {
            $this->markTestSkipped('No price index rows in this database.');
        }
        // incrementing=false is required for a composite-PK table without
        // a single AUTO_INCREMENT column; asserting on the live row proves
        // the model can actually read one, not just that the flag is set.
        $this->assertFalse($price->incrementing);
        $this->assertNotNull($price->entity_id);
    }

    public function test_catalog_category_product_links_categories_to_products(): void
    {
        $link = CatalogCategoryProduct::query()->first();
        if ($link === null) {
            $this->markTestSkipped('No category-product links in this database.');
        }
        $this->assertTrue(
            CatalogProductEntity::where('entity_id', $link->product_id)->exists(),
            'a catalog_category_product row must reference a real product'
        );
    }

    public function test_every_model_class_is_loadable(): void
    {
        $files = glob(__DIR__.'/../../src/Models/*.php');
        $this->assertNotEmpty($files);

        foreach ($files as $file) {
            $class = 'Laragento\\Models\\'.basename($file, '.php');
            $this->assertTrue(class_exists($class), "{$class} failed to load");
        }
    }
}
