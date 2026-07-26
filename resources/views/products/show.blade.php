<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('products.index') }}" class="text-sm text-nova-muted hover:text-nova-red mb-4 inline-block uppercase tracking-wide">
                &larr; Retour au catalogue
            </a>

            <div class="card-nova grid grid-cols-1 md:grid-cols-2 gap-0">

                <div class="aspect-square bg-nova-black flex items-center justify-center">
                    @if ($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full">
                    @else
                        <span class="text-nova-muted">Pas d'image</span>
                    @endif
                </div>

                <div class="p-8 flex flex-col">
                    <p class="text-xs text-nova-muted uppercase tracking-wide">{{ $product->category->name }}</p>
                    <h1 class="font-display text-3xl text-nova-white mt-2 tracking-wide">{{ $product->name }}</h1>

                    <span class="price-tag inline-block mt-4 text-xl w-fit">
                        {{ number_format($product->price, 2) }} €
                    </span>

                    <p class="text-nova-muted mt-6 flex-1">
                        {{ $product->description ?? 'Aucune description disponible pour ce produit.' }}
                    </p>

                    @if ($product->sizes->isNotEmpty())
                        <form method="POST" action="{{ route('cart.add', $product) }}" class="mt-6" x-data="{ selectedSize: null, maxStock: 1 }">
                            @csrf

                            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-2">Choisir une taille</label>
                            <div class="grid grid-cols-5 gap-2 mb-4">
                                @foreach ($product->sizes as $size)
                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="product_size_id"
                                            value="{{ $size->id }}"
                                            class="hidden peer"
                                            @click="selectedSize = {{ $size->id }}; maxStock = {{ $size->stock }}"
                                            required
                                        >
                                        <div class="border border-nova-line peer-checked:border-nova-red peer-checked:bg-nova-red peer-checked:text-nova-white text-nova-muted text-center py-2 text-sm hover:border-nova-white transition-colors">
                                            {{ $size->size }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <div class="flex items-center gap-4">
                                <input
                                    type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    :max="maxStock"
                                    class="w-20 bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red"
                                >
                                <button type="submit" class="btn-nova flex-1" :disabled="!selectedSize">
                                    Ajouter au panier
                                </button>
                            </div>
                        </form>
                    @else
                        <p class="text-sm text-nova-red mt-2 font-medium uppercase tracking-wide">Rupture de stock</p>
                    @endif
                </div>

            </div>

        </div>
    </div>
</x-app-layout>