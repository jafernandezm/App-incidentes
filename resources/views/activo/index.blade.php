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
                    

                    <form action="{{ route('activo.scanWebsite') }}" method="post" class="flex items-center">
                        @csrf
                        <div>
                            <label for="protocol" class="block text-sm text-gray-900">Protocol</label>
                            <div class="flex items-center mt-2">
                                <select name="protocol" id="protocol" class="block w-1/4 rounded-l-lg border border-gray-200 bg-white text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                    <option value="http">http</option>
                                    <option value="https" selected>https</option>
                                </select>
                                <input type="text" name="url" placeholder="example.bo" class="block w-3/4 rounded-l-none rtl:rounded-l-lg rtl:rounded-r-none placeholder-gray-400 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" />
                    
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-r focus:outline-none focus:ring focus:border-blue-300">Escanear</button>
                            </div>
                        </div>
                    </form>
                    
                    
                    @if (isset($resultados))
                        <h2 class="text-xl mb-4">Resultados del Escaneo:</h2>
                        @include('activo.tabla', ['resultados' => $resultados])
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
