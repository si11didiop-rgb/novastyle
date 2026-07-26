<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Paiement confirmé
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="card-nova p-8 text-center">
                <div class="text-green-500 text-5xl mb-4">✓</div>
                <h3 class="font-display text-2xl text-nova-white mb-2 tracking-wide">Merci pour ta commande !</h3>
                <p class="text-nova-muted mb-4">Ta commande #{{ $order->id }} a été payée et est en cours de traitement.</p>
                <p class="text-nova-white font-display text-xl mb-6">Total payé : {{ number_format($order->total, 2) }} €</p>

                <div class="flex gap-4 justify-center">
                    <a href="{{ route('orders.show', $order) }}" class="btn-nova">
                        Voir ma commande
                    </a>
                    <a href="{{ route('products.index') }}" class="px-6 py-3 border border-nova-line text-nova-muted hover:text-nova-white uppercase text-sm tracking-wide">
                        Continuer mes achats
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>