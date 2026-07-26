<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Mes commandes
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if ($orders->isEmpty())
                <div class="card-nova p-8 text-center text-nova-muted">
                    Tu n'as pas encore passé de commande.
                </div>
            @else
                <div class="card-nova divide-y divide-nova-line">
                    @foreach ($orders as $order)
                        <a href="{{ route('orders.show', $order) }}" class="flex items-center justify-between p-4 hover:bg-nova-black transition-colors">
                            <div>
                                <p class="font-medium text-nova-white">Commande #{{ $order->id }}</p>
                                <p class="text-sm text-nova-muted">{{ $order->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-display text-nova-white tracking-wide">{{ number_format($order->total, 2) }} €</p>
                                <span class="text-xs px-2 py-1 bg-nova-black text-nova-muted uppercase tracking-wide">{{ $order->status }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>