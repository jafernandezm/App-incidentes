<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pasivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Pasivos") }}
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold mb-2">Resultados del Escaneo:</h2>
                        @foreach ($resultados as $resultado)
                            <div class="mb-4 p-4 border rounded bg-gray-50 dark:bg-gray-900">
                                <p><strong>URL:</strong> {{ $resultado['url'] }}</p>
                                <p><strong>Tipo:</strong> {{ $resultado['tipo'] }}</p>
                                @if ($resultado['tipo'] == 'redireccion')
                                    <p><strong>Redirecciones:</strong></p>
                                    <ul class="list-disc pl-5">
                                        @foreach ($resultado['redirecciones'] as $redireccion)
                                            <li>{{ $redireccion }}</li>
                                        @endforeach
                                    </ul>
                                @elseif ($resultado['tipo'] == 'url_infectada')
                                    <p><strong>Detalles de la Infección:</strong></p>
                                    <ul>
                                        <li><strong>ID:</strong> {{ $resultado['infectada']['id'] }}</li>
                                        <li><strong>URL Infectada:</strong> {{ $resultado['infectada']['url'] }}</li>
                                        <li><strong>Tipo:</strong> {{ $resultado['infectada']['tipo'] }}</li>
                                        <li><strong>Fecha:</strong> {{ $resultado['infectada']['fecha'] }}</li>
                                        <li><strong>Creado en:</strong> {{ $resultado['infectada']['created_at'] }}</li>
                                        <li><strong>Actualizado en:</strong> {{ $resultado['infectada']['updated_at'] }}</li>
                                    </ul>
                                @elseif ($resultado['tipo'] == 'html_infectado')
                                    <p><strong>HTML Infectado:</strong> {{ $resultado['infectada'] }}</p>
                                    <p><strong>Detalles del HTML:</strong></p>
                                    <ul class="list-disc pl-5">
                                        @foreach ($resultado['html'] as $detalleHtml)
                                            <li>{{ $detalleHtml }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
