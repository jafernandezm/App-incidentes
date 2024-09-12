@php
    // {{ dd($resultados); }}
    $filtracionesAgrupadas = collect($resultados)->groupBy('filtracion');
    $totalFiltraciones = $filtracionesAgrupadas->count();
@endphp

<div class="grid gap-6 {{ $totalFiltraciones === 1 ? 'grid-cols-1' : ($totalFiltraciones === 2 ? 'grid-cols-2' : 'grid-cols-3') }}">
    @foreach ($filtracionesAgrupadas as $filtracion => $datos)
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 overflow-hidden">
            <h3 class="text-lg font-semibold mb-4 text-gray-900">Filtración: {{ $filtracion }}</h3>

            @if (!empty($datos[0]['informacion']))
                <div class="mt-4 p-4 bg-gray-200 rounded overflow-hidden">
                    <p class="font-medium text-gray-700">Información adicional:</p>
                    <p class="text-sm text-gray-600 whitespace-normal break-words">{{ $datos[0]['informacion'] }}</p>
                </div>
            @endif

            @foreach ($datos as $result)
                <div class="mt-4 p-4 bg-gray-200 rounded overflow-hidden">
                    @php
                        $data = json_decode($result['data'], true);
                    @endphp

                    @if ($filtracion === 'BreachDirectory')
                        @if (!empty($data))
                            @foreach ($data as $entry)
                                <div class="mb-4">
                                    @if (isset($entry['email']))
                                        <p class="font-medium text-gray-700 break-words">Email: <span class="text-gray-600 break-all">{{ $entry['email'] }}</span></p>
                                    @endif
                                    @if (isset($entry['has_password']))
                                        <p class="font-medium text-gray-700 break-words">Has Password: <span class="text-gray-600 break-all">{{ $entry['has_password'] ? 'Yes' : 'No' }}</span></p>
                                    @endif
                                    @if (isset($entry['sources']))
                                        <p class="font-medium text-gray-700 break-words">Sources: <span class="text-gray-600 break-all">{{ $entry['sources'] }}</span></p>
                                    @endif
                                    @if (isset($entry['password']))
                                        <p class="font-medium text-gray-700 break-words">Password: <span class="text-gray-600 break-all">{{ $entry['password'] }}</span></p>
                                    @endif
                                    @if (isset($entry['sha1']))
                                    <p class="font-medium text-gray-700 break-words">sha1: <span class="text-gray-600 break-all">{{ $entry['sha1'] }}</span></p>
                                @endif
                                </div>
                            @endforeach
                        @else
                            <p class="font-medium text-gray-700">No hay datos disponibles.</p>
                        @endif
                    @else
                        @if (!empty($data))
                            @foreach ($data as $key => $value)
                                <div class="mb-4">
                                    <p class="font-medium text-gray-700 break-words">{{ ucfirst($key) }}: <span class="text-gray-600 break-all">{{ $value }}</span></p>
                                </div>
                            @endforeach
                        @else
                            <p class="font-medium text-gray-700">No hay datos disponibles.</p>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
