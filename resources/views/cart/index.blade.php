<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Mon panier
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-nova-surface border border-green-600 text-green-500 px-4 py-3 mb-4 uppercase text-sm tracking-wide">
                    {{ session('success') }}
                </div>
            @endif

            @if ($cart->items->isEmpty())
                <div class="card-nova p-8 text-center text-nova-muted">
                    Ton panier est vide.
                    <a href="{{ route('products.index') }}" class="text-nova-red hover:underline">Voir le catalogue</a>
                </div>
            @else
                <div class="card-nova divide-y divide-nova-line">
                    @foreach ($cart->items as $item)
                        <div class="flex items-center justify-between p-4 gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-nova-black flex items-center justify-center overflow-hidden">
                                    @if ($item->product->image)
                                        <img src="{{ asset('storage/'.$item->product->image) }}" class="object-cover w-full h-full">
                                    @endif
                                </div>
                                <div>
                                    <p class="font-medium text-nova-white">{{ $item->product->name }}</p>
                                    @if ($item->size)
                                        <p class="text-xs text-nova-muted">Taille : <span class="text-nova-white">{{ $item->size->size }}</span></p>
                                    @endif
                                    <p class="text-sm text-nova-muted">{{ number_format($item->product->price, 2) }} € / unité</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input
                                        type="number"
                                        name="quantity"
                                        value="{{ $item->quantity }}"
                                        min="1"
                                        max="{{ $item->size?->stock ?? $item->product->stock }}"
                                        class="w-16 bg-nova-black border-nova-line text-nova-white text-sm"
                                        onchange="this.form.submit()"
                                    >
                                </form>

                                <p class="font-display text-nova-white w-20 text-right">
                                    {{ number_format($item->subtotal(), 2) }} €
                                </p>

                                <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-nova-red hover:underline text-sm uppercase tracking-wide">
                                        Retirer
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 card-nova p-6 flex items-center justify-between">
                    <p class="font-display text-2xl text-nova-white tracking-wide">Total : {{ number_format($cart->total(), 2) }} €</p>
                    <a href="{{ route('checkout.index') }}" class="btn-nova">
                        Passer la commande
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>