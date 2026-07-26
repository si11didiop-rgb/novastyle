<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <h1 class="font-display text-3xl text-nova-white tracking-wide">Produits</h1>
        <a href="{{ route('admin.products.create') }}" class="btn-nova text-sm">
            + Ajouter un produit
        </a>
    </div>

    <div class="card-nova overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-nova-black text-left text-nova-muted uppercase tracking-wide">
                <tr>
                    <th class="p-3">Image</th>
                    <th class="p-3">Nom</th>
                    <th class="p-3">Catégorie</th>
                    <th class="p-3">Prix</th>
                    <th class="p-3">Stock</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-nova-line">
                @foreach ($products as $product)
                    <tr>
                        <td class="p-3">
                            <div class="w-12 h-12 bg-nova-black overflow-hidden">
                                @if ($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="object-cover w-full h-full">
                                @endif
                            </div>
                        </td>
                        <td class="p-3 font-medium text-nova-white">{{ $product->name }}</td>
                        <td class="p-3 text-nova-muted">{{ $product->category->name }}</td>
                        <td class="p-3 text-nova-white">{{ number_format($product->price, 2) }} €</td>
                        <td class="p-3">
                            <span class="{{ $product->stock < 5 ? 'text-nova-red font-semibold' : 'text-nova-muted' }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="p-3 space-x-3">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-nova-white hover:text-nova-red uppercase text-xs tracking-wide">Modifier</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Supprimer ce produit ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-nova-red hover:underline uppercase text-xs tracking-wide">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-admin-layout>