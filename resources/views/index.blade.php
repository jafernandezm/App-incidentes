<x-index-layout>
    @vite('resources/js/table.js') 
    @section('content')
        <div class="bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Bienvenidos") }}
            </div>
            {{-- Crear un botón para ejecutar --}}
            @if(isset($escaneos))
            {{-- como paso a mi otro views mi resultado se llama resultado.blade.php --}}
                {{-- @include('pasivo.resultado', ['resultados' => $resultados]) --}}
                @include('componentes.tables', ['escaneos' => $escaneos])
            @else
              <div>
                <h1>No hay resultados</h1>
              </div>
            @endif
        </div>
    @endsection
</x-index-layout>
