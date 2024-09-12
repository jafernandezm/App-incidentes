<x-app-layout>
    @section('content')
        <div class="flex flex-col justify-center items-center p-4 rounded-lg shadow-md space-y-4 max-w-md mx-auto">
            <form method="POST" action="{{ route('filtrados.store') }}" class="w-full">
                @csrf
                <div class="flex flex-col space-y-4">
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-900">Tipo</label>
                        <select name="tipo" id="tipo"
                            class="block w-full rounded-lg border border-gray-300 bg-white text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 mt-1">
                            <option value="correo">Correo</option>
                            <option value="https">HTTPS</option>
                        </select>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="text" name="consulta" placeholder="Escribe aquí..."
                            class="flex-1 rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if (isset($resultados) && count($resultados) > 0)
            <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="p-6 bg-gray-100 text-gray-900">
                        {{ __('Filtraciones') }}
                        <div class="mt-4">
                            <h2 class="text-2xl font-semibold mb-4">Resultados de los Datos Filtrados:</h2>
                            @component('componentes.filtraciones.tables-filtrados', ['resultados' => $resultados])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="p-6 bg-gray-100 text-gray-900">
                        {{ __('Filtraciones') }}
                        <div class="mt-4">
                            <h2 class="text-2xl font-semibold mb-4">No se encontraron resultados.</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
</x-app-layout>
