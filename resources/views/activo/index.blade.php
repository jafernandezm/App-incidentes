<x-app-layout>

    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-950">
                    {{ __("Bienvenidos") }}
                    

                    <form action="{{ route('activo.scanWebsite') }}" method="post" class="flex items-center" onsubmit="showLoader()">
                        @csrf
                        <div>
                            <label for="protocol" class="block text-sm text-gray-900">Protocol</label>
                            <div class="flex items-center mt-2">
                                <select name="protocol" id="protocol" class="block w-1/4 rounded-l-lg border border-gray-200 bg-white text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <option value="http">http</option>
                                    <option value="https" selected>https</option>
                                </select>
                                <input type="text" name="url" placeholder="example.bo" class="block w-3/4 rounded-l-none rtl:rounded-l-lg rtl:rounded-r-none placeholder-gray-400 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" />
                    
                                <button type="submit" id="submit-btn" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-r focus:outline-none focus:ring focus:border-blue-300">Escanear</button>
                                
                            </div>
                        </div>
                    </form>
                    <!-- Loader, initially hidden -->
                  
                    
                    @if (isset($escaneo))
                        <h2 class="text-xl mb-4">Resultados del Escaneo:</h2>
                        @include('componentes.escaneos.escaneo')
                    @endif


                </div>
            </div>
        </div>
    </div>
    <div style="display: none; position: absolute; top: 0;  background-color: rgba(0,0, 0, .3); width: 100vw; height:100vh; z-index: 99999;
            left: 50%;
            transform: translateX(-50%);" id="loader">
            <div style="width: 100%; height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center">
                <div class="loader"></div>
                <p>Analizando sitio web. Espere porfavor.</p>
            </div>
    </div>
    <script>
        function showLoader() {
            document.getElementById('submit-btn').style.display = 'none';  // Oculta el botón de envío
            document.getElementById('loader').style.display = 'block';     // Muestra el loader
        }
    </script>
    
    <style>
        /* Loader styles */
        .loader {
            width: 50px;
            padding: 8px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: #25b09b;
            --_m: 
                conic-gradient(#0000 10%,#000),
                linear-gradient(#000 0 0) content-box;
            -webkit-mask: var(--_m);
                    mask: var(--_m);
            -webkit-mask-composite: source-out;
                    mask-composite: subtract;
            animation: l3 1s infinite linear;
        }
        @keyframes l3 {to{transform: rotate(1turn)}}
    </style>
    @endsection
</x-app-layout>
