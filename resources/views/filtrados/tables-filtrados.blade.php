<x-app-layout>
    @section('content')

    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="p-6 bg-gray-100 text-gray-900">
                {{ __("Pasivos") }}
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold mb-4">Resultados de los Datos Filtrados:</h2>
               
        @component('componentes.tables-filtrados', ['resultados' => $resultados])
            {{-- Puedes pasar datos al componente si es necesario --}}
            {{-- @slot('nombreDelSlot', $valor) --}}
        @endcomponent

                </div>
            </div>
        </div>
    </div>

    @endsection
</x-app-layout>