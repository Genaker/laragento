@extends('layout')

@section('title', 'Laragento -- Magento on Eloquent')

@section('content')
    <section class="bg-indigo-600 text-white rounded-lg px-8 py-16 text-center">
        <p class="uppercase tracking-wide text-indigo-200 text-sm mb-2">Eloquent ORM &middot; Real Magento Schema</p>
        <h1 class="text-4xl font-bold mb-4">A Laravel storefront over your Magento database</h1>
        <p class="text-indigo-100 max-w-2xl mx-auto">
            No Magento frontend, no legacy Zend_Db -- just Eloquent models mapped
            directly onto Magento 2's real EAV tables, a Magmi-style bulk CSV
            importer, and this storefront, all in idiomatic Laravel.
        </p>
    </section>

    <section class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10">
        <div class="bg-white rounded-lg border border-gray-200 p-6 text-center">
            <div class="text-3xl font-bold text-indigo-600">{{ number_format($productCount) }}</div>
            <div class="text-gray-500 mt-1">Products</div>
        </div>
        <div class="bg-white rounded-lg border border-gray-200 p-6 text-center">
            <div class="text-3xl font-bold text-indigo-600">{{ number_format($categoryCount) }}</div>
            <div class="text-gray-500 mt-1">Categories</div>
        </div>
    </section>

    @if ($featuredCategoryId)
        <div class="mt-10 text-center">
            <a href="{{ route('category.show', $featuredCategoryId) }}"
               class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-md font-medium hover:bg-indigo-700">
                Browse the catalog
            </a>
        </div>
    @endif
@endsection
