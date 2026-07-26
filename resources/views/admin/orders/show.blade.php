<x-admin-layout>
    <h1 class="font-display text-3xl text-nova-white mb-6 tracking-wide">Commande #{{ $order->id }}</h1>

    <div class="card-nova p-6 mb-6">
        <p class="text-sm text-nova-muted"><strong class="text-nova-white">Client :</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
        <div class="text-sm text-nova-muted mt-1">
    <strong class="text-nova-white">Adresse :</strong>
    <p>{{ $order->address_street }}</p>
    <p>{{ $order->address_postal }} {{ $order->address_city }}</p>
    <p>{{ $order->address_country }}</p>
</div>
        <p class="text-sm text-nova-muted mt-1"><strong class="text-nova-white">Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>

        <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}" class="mt-4 flex items-center gap-3">
            @csrf
            @method('PATCH')
            <label class="text-sm text-nova-muted uppercase tracking-wide">Statut :</label>
            <select name="status" class="bg-nova-black border-nova-line text-nova-white text-sm">
                @foreach (['en_attente', 'en_cours', 'expediee', 'livree', 'annulee'] as $status)
                    <option value="{{ $status }}" @selected($order->status === $status)>{{ $status }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-nova text-sm">
                Mettre à jour
            </button>
        </form>
    </div>

    <div class="card-nova">
        <div class="p-4 border-b border-nova-line font-display text-nova-white tracking-wide">Articles commandés</div>
        <div class="divide-y divide-nova-line">
            @foreach ($order->items as $item)
                <div class="flex justify-between p-4 text-sm text-nova-muted">
                    <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                    <span class="font-medium text-nova-white">{{ number_format($item->subtotal(), 2) }} €</span>
                </div>
            @endforeach
        </div>
        <div class="flex justify-between p-4 border-t border-nova-line font-display text-nova-white tracking-wide">
            <span>Total</span>
            <span>{{ number_format($order->total, 2) }} €</span>
        </div>
    </div>
</x-admin-layout>