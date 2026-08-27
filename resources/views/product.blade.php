@extends('layout')

@section('title', $name . ' -- Laragento')

@section('content')
    <nav class="text-sm text-gray-500 mb-4">
        <a href="{{ route('home') }}" class="hover:underline">Home</a>
        @foreach ($breadcrumbs as $crumb)
            / <a href="{{ route('category.show', $crumb['id']) }}" class="hover:underline">{{ $crumb['name'] }}</a>
        @endforeach
        / {{ $name }}
    </nav>

    <div class="bg-white border border-gray-200 rounded-lg p-8">
        <h1 class="text-3xl font-bold mb-2">{{ $name }}</h1>
        <p class="text-sm text-gray-500 mb-4">SKU: {{ $sku }}</p>

        <div class="text-2xl text-indigo-600 font-semibold mb-6">
            @if ($price !== null)
                ${{ number_format((float) $price, 2) }}
            @else
                Price not set
            @endif
        </div>

        @if ($shortDescription)
            <p class="text-gray-700 mb-4">{{ $shortDescription }}</p>
        @endif

        @if ($description)
            <div class="prose max-w-none text-gray-700">{!! nl2br(e($description)) !!}</div>
        @endif

        @if ($weight !== null)
            <p class="text-sm text-gray-500 mt-6">Weight: {{ $weight }}</p>
        @endif
    </div>
@endsection
