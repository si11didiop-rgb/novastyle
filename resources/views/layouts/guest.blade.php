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
        @production
            <link rel="stylesheet" href="/build/assets/app-Ba6c4dew.css">
            <script src="/build/assets/app-BfpX1doZ.js" defer></script>
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endproduction
    </head>
    <body class="font-body text-nova-white antialiased bg-nova-black">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="{{ route('home') }}" class="font-display text-3xl text-nova-white tracking-wide">
                    NOVA<span class="text-nova-red">STYLE</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 card-nova">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>