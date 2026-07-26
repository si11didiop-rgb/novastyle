<x-app-layout>
    <div class="bg-nova-black">

        <!-- Hero -->
        <div class="relative overflow-hidden border-b border-nova-line">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
                <h1 class="font-display text-5xl sm:text-7xl text-nova-white tracking-wide">
                    NOVA<span class="text-nova-red">STYLE</span>
                </h1>
                <p class="text-nova-muted mt-4 text-lg uppercase tracking-widest">
                    Streetwear sans compromis
                </p>
                <a href="{{ route('products.index') }}" class="btn-nova inline-block mt-8">
                    Voir le catalogue
                </a>
            </div>
        </div>

        <!-- Catégories -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="font-display text-2xl text-nova-white tracking-wide mb-6">Catégories</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="card-nova p-6 text-center">
                        <span class="font-display text-nova-white text-sm uppercase tracking-wide">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Produits vedettes -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-nova-line">
            <h2 class="font-display text-2xl text-nova-white tracking-wide mb-6">Dernières pièces</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($featured as $product)
                    <a href="{{ route('products.show', $product->slug) }}" class="card-nova group block">
                        <div class="aspect-square bg-nova-black flex items-center justify-center overflow-hidden relative">
                            @if ($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full group-hover:scale-105 transition duration-300">
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
        </div>

    </div>
</x-app-layout>