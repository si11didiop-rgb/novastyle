<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Mon compte
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <p class="text-nova-muted mb-8">
                Bienvenue, <span class="text-nova-white font-medium">{{ auth()->user()->name }}</span>.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <a href="{{ route('products.index') }}" class="card-nova p-6">
                    <h3 class="font-display text-lg text-nova-white tracking-wide mb-2">Catalogue</h3>
                    <p class="text-sm text-nova-muted">Découvrir les dernières pièces NovaStyle.</p>
                </a>

                <a href="{{ route('cart.index') }}" class="card-nova p-6">
                    <h3 class="font-display text-lg text-nova-white tracking-wide mb-2">Mon panier</h3>
                    <p class="text-sm text-nova-muted">Voir les articles en attente d'achat.</p>
                </a>

                <a href="{{ route('orders.index') }}" class="card-nova p-6">
                    <h3 class="font-display text-lg text-nova-white tracking-wide mb-2">Mes commandes</h3>
                    <p class="text-sm text-nova-muted">Suivre l'état de tes commandes passées.</p>
                </a>

                <a href="{{ route('profile.edit') }}" class="card-nova p-6">
                    <h3 class="font-display text-lg text-nova-white tracking-wide mb-2">Mon profil</h3>
                    <p class="text-sm text-nova-muted">Modifier tes informations personnelles.</p>
                </a>

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="card-nova p-6 border-nova-red">
                        <h3 class="font-display text-lg text-nova-red tracking-wide mb-2">Espace admin</h3>
                        <p class="text-sm text-nova-muted">Gérer produits, catégories et commandes.</p>
                    </a>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>