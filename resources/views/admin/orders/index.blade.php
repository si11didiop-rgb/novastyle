<x-admin-layout>
    <h1 class="font-display text-3xl text-nova-white mb-6 tracking-wide">Commandes</h1>

    <div class="card-nova mb-6 p-4">
        <form method="GET">
            <select name="status" class="bg-nova-black border-nova-line text-nova-white text-sm" onchange="this.form.submit()">
                <option value="">Tous les statuts</option>
                @foreach (['en_attente', 'en_cours', 'expediee', 'livree', 'annulee'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="card-nova overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-nova-black text-left text-nova-muted uppercase tracking-wide">
                <tr>
                    <th class="p-3">N°</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Statut</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-nova-line">
                @foreach ($orders as $order)
                    <tr>
                        <td class="p-3 font-medium text-nova-white">#{{ $order->id }}</td>
                        <td class="p-3 text-nova-muted">{{ $order->user->name }}</td>
                        <td class="p-3 text-nova-muted">{{ $order->created_at->format('d/m/Y') }}</td>
                        <td class="p-3 text-nova-white">{{ number_format($order->total, 2) }} €</td>
                        <td class="p-3">
                            <span class="text-xs px-2 py-1 bg-nova-black text-nova-muted uppercase tracking-wide">{{ $order->status }}</span>
                        </td>
                        <td class="p-3">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-nova-white hover:text-nova-red uppercase text-xs tracking-wide">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</x-admin-layout>