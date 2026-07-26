<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Commande #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-nova-surface border border-green-600 text-green-500 px-4 py-3 mb-4 uppercase text-sm tracking-wide">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-nova p-6">
                <div class="flex justify-between text-sm text-nova-muted mb-4">
                    <span>Passée le {{ $order->created_at->format('d/m/Y à H:i') }}</span>
                    <span class="px-2 py-1 bg-nova-black text-nova-muted uppercase tracking-wide">{{ $order->status }}</span>
                </div>

                <div class="text-sm text-nova-muted mb-4">
    <strong class="text-nova-white block mb-1">Adresse de livraison :</strong>
    <p>{{ $order->address_street }}</p>
    <p>{{ $order->address_postal }} {{ $order->address_city }}</p>
    <p>{{ $order->address_country }}</p>
</div>

                <div class="divide-y divide-nova-line border-t border-nova-line">
                    @foreach ($order->items as $item)
                        <div class="flex justify-between py-3 text-sm text-nova-muted">
                            <span>{{ $item->product->name }} @if($item->size)({{ $item->size->size }})@endif × {{ $item->quantity }}</span>
                            <span class="font-medium text-nova-white">{{ number_format($item->subtotal(), 2) }} €</span>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between pt-4 border-t border-nova-line mt-2 font-display text-xl text-nova-white tracking-wide">
                    <span>Total</span>
                    <span>{{ number_format($order->total, 2) }} €</span>
                </div>

                @if ($order->status === 'en_attente')
                    <div class="mt-6 pt-6 border-t border-nova-line">
                        <p class="text-nova-muted text-sm mb-4">Ta commande est en attente de paiement.</p>
                        <a href="{{ route('payment.checkout', $order) }}" class="btn-nova inline-block">
                            Payer maintenant
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>