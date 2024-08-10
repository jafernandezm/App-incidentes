<x-app-layout>
    {{-- {{dd($resultados)}} --}}
    @section('content')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 black-gray-900 black:text-gray-100">
                    {{ __('Pasivos') }}
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold mb-2">Resultados del Escaneo:</h2>

                        @foreach ($resultados as $resultado)
                            <div class="mb-4 p-4 border rounded bg-slate-400 white:bg-gray-900">
                                <p><strong>URL:</strong> {{ $resultado['url'] }}</p>
                                <p><strong>Tipo:</strong> {{ $resultado['tipo'] }}</p>
                                @if ($resultado['tipo'] == 'redireccion')
                                    <p><strong>Redirecciones:</strong></p>
                                    <ul class="list-disc pl-5">
                                        @foreach (json_decode($resultado['redirecciones']) as $redireccion)
                                            <li>{{ $redireccion }}</li>
                                        @endforeach
                                    </ul>
                                @elseif ($resultado['tipo'] == 'url_infectada' && is_array($resultado['infectada']))
                                    <p><strong>Detalles de la Infección:</strong></p>
                                    <ul>
                                        <li><strong>ID:</strong> {{ $resultado['infectada']['id'] }}</li>
                                        <li><strong>URL Infectada:</strong> {{ $resultado['infectada']['url'] }}</li>
                                        <li><strong>Tipo:</strong> {{ $resultado['infectada']['tipo'] }}</li>
                                        <li><strong>Fecha:</strong> {{ $resultado['infectada']['fecha'] }}</li>
                                        <li><strong>Creado en:</strong> {{ $resultado['infectada']['created_at'] }}</li>
                                        <li><strong>Actualizado en:</strong> {{ $resultado['infectada']['updated_at'] }}
                                        </li>
                                    </ul>
                                @elseif ($resultado['tipo'] == 'html_infectado')
                                    <p><strong>HTML Infectado:</strong> {{ json_decode($resultado['infectada']) }}</p>
                                    <p><strong>Detalles del HTML:</strong></p>
                                    <ul class="list-disc pl-5">
                                        @if (isset($resultado['html']))
                                            @php
                                                //dd($resultado['html']);
                                                $detalleHtmlArray = is_string($resultado['html'])
                                                    ? json_decode($resultado['html'], true)
                                                    : $resultado['html'];
                                            @endphp
                                            @if (is_array($detalleHtmlArray))
                                                @foreach ($detalleHtmlArray as $detalleHtml)
                                                    <li>{{ $detalleHtml }}</li>
                                                @endforeach
                                            @else
                                                <li>No se encontraron detalles del HTML.</li>
                                            @endif
                                        @endif
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
