<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Catalogue
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-wrap items-center justify-between gap-4 mb-8 bg-nova-surface border border-nova-line p-4">
                <form method="GET" action="{{ route('products.index') }}" class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un produit..."
                        class="bg-nova-black border-nova-line text-nova-white placeholder-nova-muted focus:ring-nova-red focus:border-nova-red"
                    >

                    <select name="category" class="bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn-nova text-sm">
                        Filtrer
                    </button>
                </form>
            </div>

            @if ($products->isEmpty())
                <div class="bg-nova-surface border border-nova-line p-8 text-center text-nova-muted">
                    Aucun produit ne correspond à ta recherche.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <a href="{{ route('products.show', $product->slug) }}" class="card-nova group block">
                            <div class="aspect-square bg-nova-black flex items-center justify-center overflow-hidden relative">
                                @if ($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full group-hover:scale-105 transition duration-300">
                                @else
                                    <span class="text-nova-muted text-sm">Pas d'image</span>
                                @endif
                                <span class="price-tag absolute top-3 right-3">
                                    {{ number_format($product->price, 2) }} €
                                </span>
                            </div>
                            <div class="p-4">
                                <p class="text-xs text-nova-muted uppercase tracking-wide">{{ $product->category->name }}</p>
                                <h3 class="font-display text-lg text-nova-white mt-1 tracking-wide">{{ $product->name }}</h3>
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