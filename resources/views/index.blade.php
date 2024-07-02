<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenidos") }}
                    
                   {{-- Crear un botón para ejecutar --}}
                   <div class="mt-4 flex justify-center p-4 rounded-lg shadow-md">
                    <form method="POST" action="{{ route('index') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded border-2 shadow-lg">
                            Escanear
                        </button>
                    </form>
                </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>