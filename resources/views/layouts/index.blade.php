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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/componets/table.js','resources/js/pasivo/app.js'])

    <style>
        .fade-out {
            transition: opacity 1s ease-out;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="flex flex-col items-center w-16 h-full py-8 overflow-y-auto bg-white border-r rtl:border-l rtl:border-r-0 fixed">
            @include('componentes.sidebar')
        </aside>
        
        <div class="flex flex-col flex-1 ml-16"> <!-- Ajustar margen izquierdo para espacio del sidebar -->
            <!-- Navbar -->
            <nav x-data="{ isOpen: false }" class="fixed top-0 left-0 w-full bg-white shadow z-30">
                @include('componentes.navbar')
            </nav>
            
            <main class="flex-1 p-2 w-full">
                @if (session('error'))
                    <div id="error-alert" class="bg-red-500 text-white p-4 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div id="error-alert" class="bg-red-500 text-white p-4 rounded mb-4">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Contenido de la página -->
                @yield('content')
            </main>

            <!-- Footer -->
            {{-- @include('componentes.footer') --}}
        </div>
    </div>
</body>



</html>
