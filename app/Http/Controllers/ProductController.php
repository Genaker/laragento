<?php

namespace App\Http\Controllers;

use App\Support\EavFlattener;
use Illuminate\Contracts\View\View;
use Laragento\Models\CatalogCategoryEntity;
use Laragento\Models\CatalogCategoryProduct;
use Laragento\Models\CatalogProductEntity;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    private const PRODUCT_ATTRIBUTES = ['name', 'description', 'short_description', 'price', 'weight'];

    private const CATEGORY_NAME_ATTRIBUTE = ['name'];

    /**
     * Root categories every product implicitly belongs to that aren't
     * meaningful storefront navigation on their own -- mirrors the same
     * exclusion set the Go and Rust storefronts both hardcode for
     * breadcrumbs.
     */
    private const BREADCRUMB_EXCLUDED_IDS = [1, 2];

    public function show(int $id): View
    {
        $product = CatalogProductEntity::find($id);
        if ($product === null) {
            throw new NotFoundHttpException("Product {$id} not found");
        }

        $attrs = EavFlattener::flattenProduct($id, self::PRODUCT_ATTRIBUTES);

        $lastCategoryId = CatalogCategoryProduct::where('product_id', $id)->orderByDesc('category_id')->value('category_id');
        $breadcrumbs = $lastCategoryId !== null ? $this->buildBreadcrumbs((int) $lastCategoryId) : [];

        return view('product', [
            'entityId' => $id,
            'sku' => $product->sku,
            'name' => $attrs['name'] ?? $product->sku,
            'description' => $attrs['description'] ?? '',
            'shortDescription' => $attrs['short_description'] ?? '',
            'price' => $attrs['price'] ?? null,
            'weight' => $attrs['weight'] ?? null,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /** @return array<int,array{id:int,name:string}> */
    private function buildBreadcrumbs(int $lastCategoryId): array
    {
        $category = CatalogCategoryEntity::find($lastCategoryId);
        if ($category === null) {
            return [];
        }

        $ids = array_filter(
            array_map('intval', explode('/', $category->path)),
            fn (int $id) => ! in_array($id, self::BREADCRUMB_EXCLUDED_IDS, true)
        );
        if (empty($ids)) {
            return [];
        }

        $breadcrumbs = [];
        foreach ($ids as $id) {
            $attrs = EavFlattener::flattenCategory($id, self::CATEGORY_NAME_ATTRIBUTE);
            $breadcrumbs[] = ['id' => $id, 'name' => $attrs['name'] ?? "Category {$id}"];
        }

        return $breadcrumbs;
    }
}
