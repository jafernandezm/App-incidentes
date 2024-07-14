<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen bg-gray-100 white:bg-gray-900">
            <!-- Sidebar -->
            @include('componentes.sidebar')
    
            <div class="flex flex-col flex-1">
                <!-- Navbar -->
                @include('componentes.navbar')
    
                <div class="flex-1">
                    <div class="ml-20 mr-4 p-4">
                        <main>
                            <!-- Contenido de la página -->
                            {{-- como creo un contenido para traerlo desde cualquier parte --}}
                            @yield('content')
                            <!-- Footer -->
                            {{-- @include('componentes.footer') --}}
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
