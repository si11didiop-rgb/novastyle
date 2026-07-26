<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catalogue NovaStyle
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-wrap items-center justify-between gap-4 mb-6 bg-white p-4 rounded-lg shadow">
                <form method="GET" action="{{ route('products.index') }}" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un produit..."
                        class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    >

                    <select name="category" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                        Filtrer
                    </button>
                </form>
            </div>

            @if ($products->isEmpty())
                <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
                    Aucun produit ne correspond à ta recherche.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <a href="{{ route('products.show', $product->slug) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden group">
                            <div class="aspect-square bg-gray-100 flex items-center justify-center overflow-hidden">
                                @if ($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full group-hover:scale-105 transition">
                                @else
                                    <span class="text-gray-400 text-sm">Pas d'image</span>
                                @endif
                            </div>
                            <div class="p-4">
                                <p class="text-xs text-gray-500 uppercase tracking-wide">{{ $product->category->name }}</p>
                                <h3 class="font-semibold text-gray-900 mt-1">{{ $product->name }}</h3>
                                <p class="text-lg font-bold text-gray-900 mt-2">{{ number_format($product->price, 2) }} €</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>