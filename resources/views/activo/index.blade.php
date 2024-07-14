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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenidos") }}
                    

                    <form action="{{ route('activo.scanWebsite') }}" method="post" class="flex items-center">
                        @csrf
                        <div>
                            <label for="domain name" class="block text-sm text-gray-500 dark:text-gray-300">Domain Name</label>
                        
                            <div class="flex items-center mt-2">
                                <p class="py-2.5 px-3 text-gray-500 bg-gray-100 white:bg-gray-800 dark:border-gray-700 border border-r-0 rtl:rounded-r-lg rtl:rounded-l-none rtl:border-l-0 rtl:border-r rounded-l-lg">http://</p>
                                <input type="text" name="url" placeholder="merakiui.com" class="block w-full rounded-l-none rtl:rounded-l-lg rtl:rounded-r-none placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 white:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-r focus:outline-none focus:ring focus:border-blue-300">Escanear</button>
                            </div>
                        </div>


                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
