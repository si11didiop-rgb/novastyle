<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin — NovaStyle</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=anton:400|inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-nova-black font-body">
    <div class="flex min-h-screen">

        <aside class="w-64 bg-nova-surface border-r border-nova-line flex flex-col">
            <div class="p-6 border-b border-nova-line">
                <span class="font-display text-xl text-nova-white tracking-wide">NOVA<span class="text-nova-red">STYLE</span></span>
                <p class="text-xs text-nova-muted uppercase tracking-wide mt-1">Admin</p>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm uppercase tracking-wide {{ request()->routeIs('admin.dashboard') ? 'bg-nova-red text-nova-white' : 'text-nova-muted hover:bg-nova-black hover:text-nova-white' }}">
                    Tableau de bord
                </a>
                <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-sm uppercase tracking-wide {{ request()->routeIs('admin.products.*') ? 'bg-nova-red text-nova-white' : 'text-nova-muted hover:bg-nova-black hover:text-nova-white' }}">
                    Produits
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 text-sm uppercase tracking-wide {{ request()->routeIs('admin.categories.*') ? 'bg-nova-red text-nova-white' : 'text-nova-muted hover:bg-nova-black hover:text-nova-white' }}">
                    Catégories
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 text-sm uppercase tracking-wide {{ request()->routeIs('admin.orders.*') ? 'bg-nova-red text-nova-white' : 'text-nova-muted hover:bg-nova-black hover:text-nova-white' }}">
                    Commandes
                </a>
                <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm uppercase tracking-wide text-nova-muted hover:text-nova-white mt-6">
                    &larr; Retour au site
                </a>
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-nova-line">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm uppercase tracking-wide text-nova-muted hover:text-nova-white">
                    Déconnexion
                </button>
            </form>
        </aside>

        <main class="flex-1 p-8 bg-nova-black">
            @if (session('success'))
                <div class="bg-nova-surface border border-green-600 text-green-500 px-4 py-3 mb-6 uppercase text-sm tracking-wide">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-nova-surface border border-nova-red text-nova-red px-4 py-3 mb-6 uppercase text-sm tracking-wide">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </main>

    </div>
</body>
</html>