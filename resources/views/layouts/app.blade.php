<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100 flex flex-col md:flex-row"> <!-- Cambia a columnas en móviles -->

            <nav class="side-navbar md:w-64 border-r border-gray-200">
                <ul class="side-menu w-full h-full" id="side-main-menu">
                    <li class="h-16 flex items-center justify-center border-b border-gray-200">
                        <a href="{{ route('dashboard') }}" class="text-lg font-semibold">Orbi Control</a>
                    </li>
                    <li class="w-full h-12 flex items-center justify-start">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="w-full h-full flex items-center px-4">
                            {{ __('Home') }}
                        </x-nav-link>
                    </li>
                </ul>
            </nav>
            
            <div class="flex-1">
                <livewire:layout.navigation />

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="header">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <h1>{{ $header }}</h1>
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
        
    </body>
</html>
