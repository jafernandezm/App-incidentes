<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @php
        $filtracionesAgrupadas = collect($resultados)->groupBy('filtracion');
    @endphp

    @foreach ($filtracionesAgrupadas as $filtracion => $datos)
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 overflow-hidden">
            <h3 class="text-lg font-semibold mb-4 text-gray-900">Filtración: {{ $filtracion }}</h3>

            @if (!empty($datos[0]['informacion']))
                <div class="mt-4 p-4 bg-gray-200 rounded overflow-hidden">
                    <p class="font-medium text-gray-700">Información adicional:</p>
                    <p class="text-sm text-gray-600 whitespace-normal break-words">{{ $datos[0]['informacion'] }}
                    </p>
                </div>
            @endif

            @foreach ($datos as $result)
                <div class="mt-4 p-4 bg-gray-200 rounded overflow-hidden">
                    @php
                        $data = json_decode($result['data'], true);
                    @endphp

                    @if (!empty($data))
                        @foreach ($data as $key => $value)
                            <div class="mb-4">
                                <p class="font-medium text-gray-700 break-words">{{ ucfirst($key) }}: <span
                                        class="text-gray-600 break-all">{{ $value }}</span></p>
                            </div>
                        @endforeach
                    @else
                        <p class="font-medium text-gray-700">No hay datos disponibles.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
