<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Paiement annulé
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="card-nova p-8 text-center">
                <div class="text-nova-red text-5xl mb-4">✕</div>
                <h3 class="font-display text-2xl text-nova-white mb-2 tracking-wide">Paiement annulé</h3>
                <p class="text-nova-muted mb-6">Tu as annulé le paiement. Ta commande #{{ $order->id }} est toujours en attente.</p>

                <div class="flex gap-4 justify-center">
                    <a href="{{ route('payment.checkout', $order) }}" class="btn-nova">
                        Réessayer le paiement
                    </a>
                    <a href="{{ route('orders.show', $order) }}" class="px-6 py-3 border border-nova-line text-nova-muted hover:text-nova-white uppercase text-sm tracking-wide">
                        Voir ma commande
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>