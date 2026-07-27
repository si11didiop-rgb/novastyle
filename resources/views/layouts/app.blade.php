<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'NovaStyle') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=anton:400|inter:400,500,600,700&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-body antialiased bg-nova-black text-nova-white">
        <div class="min-h-screen bg-nova-black flex flex-col">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-nova-surface border-b border-nova-line">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>

        <!-- Bandeau cookies -->
<div
    x-data="{ show: !localStorage.getItem('cookies_accepted') }"
    x-show="show"
    x-transition
    class="fixed bottom-0 left-0 right-0 bg-nova-surface border-t border-nova-line p-4 z-50"
>
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-sm text-nova-muted text-center sm:text-left">
            NovaStyle utilise uniquement des cookies de session nécessaires au fonctionnement du site (panier, connexion). Aucun cookie publicitaire.
            <a href="{{ route('privacy') }}" class="text-nova-red hover:underline">En savoir plus</a>
        </p>
        <button
            @click="localStorage.setItem('cookies_accepted', '1'); show = false"
            class="btn-nova text-sm whitespace-nowrap"
        >
            J'accepte
        </button>
    </div>
</div>
    </body>
</html>