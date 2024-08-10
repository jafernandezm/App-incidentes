<x-app-layout>
    @vite('resources/js/pasivo/app.js')

    @section('content')
        <!-- Mostrar mensajes de error -->
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @component('pasivo.busqueda')
        @endcomponent

        @if (isset($resultados))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 black:text-gray-100">
                        {{ __('Pasivos') }}
                        {{-- como paso a mi otro views mi resultado se llama resultado.blade.php --}}
                        @include('pasivo.tabla', ['resultados' => $resultados])
                    </div>
                </div>
            </div>
        @endif
    @endsection

</x-app-layout>
