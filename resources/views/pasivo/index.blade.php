<x-app-layout>
    @vite('resources/js/pasivo/app.js')

    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pasivos') }}
        </h2>
    </x-slot>
    {{-- comprobar si existe resultado --}}
    <div class="mt-4 flex flex-col justify-center items-center p-4 rounded-lg shadow-md space-y-2">
        <h1 class="text-2xl font-bold text-center">Escanear</h1>
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md white:bg-gray-800">

           
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div class="flex items-center mb-4">
                        <label class="text-gray-700 mr-2" for="dorks">Dorks</label>
                        <div class="flex-grow flex items-center">
                            <input id="dorks" type="text" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-l-md dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <button id="addButton" class="px-4 py-2 text-white bg-blue-500 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                Agregar
                            </button>
                        </div>
                    </div>
        
                    <form method="POST" action="{{ route('pasivo.scanWebsite') }}">
                        @csrf
                        <div class="flex items-center"> 
                            <label class="text-gray-700 " for="username">cantidad de paginas</label>
                            <input id="username" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                

                        <div class="flex justify-end mt-6">
                            <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-500  rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Enviar</button>
                        </div>

                    </form>
                </div>
           
                <ul id="dorkList" class="dork-list"></ul>
        </section>
    </div>
    
  

    
    @if(isset($resultados))
        {{-- como paso a mi otro views mi resultado se llama resultado.blade.php --}}
        @include('pasivo.resultado', ['resultados' => $resultados])
    @endif
    @endsection
    
</x-app-layout>
