<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenidos") }}
                    

                    <form action="{{ route('activo') }}" method="post" class="flex items-center">
                        @csrf
                        <input type="text" name="url" placeholder="Ingrese la URL del sitio web" class="rounded-l px-4 py-2 w-64 ">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring focus:border-blue-300">Escanear</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
