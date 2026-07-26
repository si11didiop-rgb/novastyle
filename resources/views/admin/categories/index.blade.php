<x-admin-layout>
    <h1 class="font-display text-3xl text-nova-white mb-6 tracking-wide">Catégories</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="card-nova p-6">
            <h2 class="font-display text-lg text-nova-white mb-4 tracking-wide">Ajouter une catégorie</h2>
            <form method="POST" action="{{ route('admin.categories.store') }}" class="flex gap-2">
                @csrf
                <input type="text" name="name" placeholder="Nom de la catégorie" class="flex-1 bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                <button type="submit" class="btn-nova text-sm">
                    Ajouter
                </button>
            </form>
            @error('name')<p class="text-nova-red text-sm mt-2">{{ $message }}</p>@enderror
        </div>

        <div class="card-nova">
            <div class="p-4 border-b border-nova-line font-display text-nova-white tracking-wide">Liste des catégories</div>
            <div class="divide-y divide-nova-line">
                @foreach ($categories as $category)
                    <div class="flex items-center justify-between p-4">
                        <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="flex-1 flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="name" value="{{ $category->name }}" class="flex-1 bg-nova-black border-nova-line text-nova-white text-sm">
                            <span class="text-xs text-nova-muted">({{ $category->products_count }})</span>
                            <button type="submit" class="text-nova-white hover:text-nova-red uppercase text-xs tracking-wide">Modifier</button>
                        </form>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="ml-2" onsubmit="return confirm('Supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-nova-red hover:underline uppercase text-xs tracking-wide">Supprimer</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-admin-layout>