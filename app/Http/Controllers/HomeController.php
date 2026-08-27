<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Laragento\Models\CatalogCategoryEntity;
use Laragento\Models\CatalogCategoryProduct;
use Laragento\Models\CatalogProductEntity;

class HomeController extends Controller
{
    public function index(): View
    {
        $productCount = CatalogProductEntity::count();
        $categoryCount = CatalogCategoryEntity::count();

        $featuredCategoryId = CatalogCategoryProduct::query()
            ->selectRaw('category_id, COUNT(*) as product_count')
            ->groupBy('category_id')
            ->orderByDesc('product_count')
            ->value('category_id');

        return view('home', [
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
            'featuredCategoryId' => $featuredCategoryId,
        ]);
    }
}
