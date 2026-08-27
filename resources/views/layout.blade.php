<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laragento')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">Laragento</a>
            <span class="text-sm text-gray-500">Eloquent over a real Magento database</span>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-200 mt-12">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-500">
            Laragento &mdash; <a href="https://github.com/Genaker/laragento" class="underline">github.com/Genaker/laragento</a>
        </div>
    </footer>
</body>
</html>
