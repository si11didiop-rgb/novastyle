<x-admin-layout>
    <h1 class="font-display text-3xl text-nova-white mb-6 tracking-wide">Ajouter un produit</h1>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="card-nova p-6 space-y-4 max-w-2xl">
        @csrf

        <div>
            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Nom du produit</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
            @error('name')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Catégorie</label>
            <select name="category_id" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                <option value="">— Choisir —</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Prix (€)</label>
            <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
            @error('price')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-2">Stock par taille</label>
            <div class="grid grid-cols-5 gap-3">
                @foreach ($availableSizes as $size)
                    <div>
                        <label class="block text-xs text-nova-muted text-center mb-1">{{ $size }}</label>
                        <input
                            type="number"
                            min="0"
                            name="sizes[{{ $size }}]"
                            value="{{ old('sizes.'.$size) }}"
                            placeholder="0"
                            class="w-full bg-nova-black border-nova-line text-nova-white text-center text-sm"
                        >
                    </div>
                @endforeach
            </div>
            <p class="text-xs text-nova-muted mt-2">Laisse vide les tailles non disponibles pour ce produit.</p>
            @error('sizes.*')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full text-nova-muted">
            @error('image')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-nova">
                Créer le produit
            </button>
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-nova-line text-nova-muted hover:text-nova-white hover:border-nova-white uppercase text-sm tracking-wide">
                Annuler
            </a>
        </div>
    </form>
</x-admin-layout>