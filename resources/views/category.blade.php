@extends('layout')

@section('title', $categoryName . ' -- Laragento')

@section('content')
    <nav class="text-sm text-gray-500 mb-4">
        <a href="{{ route('home') }}" class="hover:underline">Home</a> / {{ $categoryName }}
    </nav>
    <h1 class="text-2xl font-bold mb-6">{{ $categoryName }}</h1>

    @if ($products->isEmpty())
        <p class="text-gray-500">No products in this category.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{ route('product.show', $product['entity_id']) }}"
                   class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                    <div class="font-medium text-gray-900 truncate">{{ $product['name'] }}</div>
                    <div class="text-indigo-600 mt-2">
                        @if ($product['price'] !== null)
                            ${{ number_format((float) $product['price'], 2) }}
                        @else
                            &mdash;
                        @endif
                    </div>
                </a>
            @endforeach
        </div>

        @if ($totalPages > 1)
            <div class="flex items-center gap-2 mt-8 justify-center">
                @for ($n = 1; $n <= $totalPages; $n++)
                    <a href="{{ route('category.show', ['id' => $categoryId, 'page' => $n]) }}"
                       class="px-3 py-1 rounded {{ $n === $page ? 'bg-indigo-600 text-white' : 'bg-white border border-gray-200 text-gray-700' }}">
                        {{ $n }}
                    </a>
                @endfor
            </div>
        @endif
    @endif
@endsection
