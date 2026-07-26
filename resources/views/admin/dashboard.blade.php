<x-admin-layout>
    <h1 class="font-display text-3xl text-nova-white mb-6 tracking-wide">Tableau de bord</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="card-nova p-6">
            <p class="text-sm text-nova-muted uppercase tracking-wide">Produits</p>
            <p class="font-display text-3xl text-nova-white mt-1">{{ $stats['total_products'] }}</p>
        </div>
        <div class="card-nova p-6">
            <p class="text-sm text-nova-muted uppercase tracking-wide">Commandes</p>
            <p class="font-display text-3xl text-nova-white mt-1">{{ $stats['total_orders'] }}</p>
        </div>
        <div class="card-nova p-6">
            <p class="text-sm text-nova-muted uppercase tracking-wide">Clients</p>
            <p class="font-display text-3xl text-nova-white mt-1">{{ $stats['total_users'] }}</p>
        </div>
        <div class="card-nova p-6">
            <p class="text-sm text-nova-muted uppercase tracking-wide">Chiffre d'affaires</p>
            <p class="font-display text-3xl text-nova-red mt-1">{{ number_format($stats['revenue'], 2) }} €</p>
        </div>
        <div class="card-nova p-6">
            <p class="text-sm text-nova-muted uppercase tracking-wide">En attente</p>
            <p class="font-display text-3xl text-yellow-500 mt-1">{{ $stats['pending_orders'] }}</p>
        </div>
        <div class="card-nova p-6">
            <p class="text-sm text-nova-muted uppercase tracking-wide">Stock faible</p>
            <p class="font-display text-3xl text-nova-red mt-1">{{ $stats['low_stock'] }}</p>
        </div>
    </div>

    <div class="card-nova">
        <div class="p-4 border-b border-nova-line font-display text-nova-white tracking-wide">Dernières commandes</div>
        <div class="divide-y divide-nova-line">
            @foreach ($recentOrders as $order)
                <a href="{{ route('admin.orders.show', $order) }}" class="flex justify-between p-4 hover:bg-nova-black transition-colors text-nova-muted">
                    <span>#{{ $order->id }} — {{ $order->user->name }}</span>
                    <span class="font-medium text-nova-white">{{ number_format($order->total, 2) }} €</span>
                </a>
            @endforeach
        </div>
    </div>
</x-admin-layout>