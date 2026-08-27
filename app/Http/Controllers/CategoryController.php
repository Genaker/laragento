<?php

namespace App\Http\Controllers;

use App\Support\EavFlattener;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Laragento\Models\CatalogCategoryEntity;
use Laragento\Models\CatalogCategoryProduct;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    private const LIST_ATTRIBUTES = ['name'];

    private const PRODUCT_GRID_ATTRIBUTES = ['name', 'price'];

    public function show(Request $request, int $id): View
    {
        $category = CatalogCategoryEntity::find($id);
        if ($category === null) {
            throw new NotFoundHttpException("Category {$id} not found");
        }

        $attrs = EavFlattener::flattenCategory($id, self::LIST_ATTRIBUTES);

        $perPage = 12;
        $totalProducts = CatalogCategoryProduct::where('category_id', $id)->count();
        $totalPages = max(1, (int) ceil($totalProducts / $perPage));
        $page = min($totalPages, max(1, (int) $request->query('page', 1)));

        // A real DB-level LIMIT/OFFSET, not "pull every product_id in the
        // category into memory and slice it in PHP" -- category_id=2 in a
        // stock Magento sample-data install already has 1000+ products, and
        // that number only grows for a real catalog.
        $pageIds = CatalogCategoryProduct::where('category_id', $id)
            ->orderBy('position')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->pluck('product_id');

        // One query per EAV value table for every product on this page,
        // not one query per table *per product* -- flattenProduct() in a
        // loop here would be an N+1 query bug for a 12-product grid.
        $attrsByProduct = EavFlattener::flattenProducts($pageIds->all(), self::PRODUCT_GRID_ATTRIBUTES);

        $products = $pageIds->map(function (int $productId) use ($attrsByProduct) {
            $productAttrs = $attrsByProduct[$productId] ?? [];

            return [
                'entity_id' => $productId,
                'name' => $productAttrs['name'] ?? "Product {$productId}",
                'price' => $productAttrs['price'] ?? null,
            ];
        });

        return view('category', [
            'categoryId' => $id,
            'categoryName' => $attrs['name'] ?? "Category {$id}",
            'products' => $products,
            'page' => $page,
            'perPage' => $perPage,
            'totalProducts' => $totalProducts,
            'totalPages' => $totalPages,
        ]);
    }
}
