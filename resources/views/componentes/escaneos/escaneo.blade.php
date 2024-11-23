


<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-gray-100 shadow-md rounded-lg px-6 py-4 mb-6 border border-gray-300">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Resultados del Escaneo para {{ $escaneo['url'] }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Parámetros del Escaneo -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">PARÁMETROS DEL ESCANEO</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600">
                    @php
                        $detalles = json_decode($escaneo['detalles'], true);
                        $cms = $detalles['CMS'] ?? [];
                        $cmsText = 'Desconocido';
                        if (is_array($cms) && !empty($cms)) {
                            $cmsText = implode(
                                ', ',
                                array_map(function ($item) {
                                    $tec = $item['TEC'] ?? 'Desconocido';
                                    $version = $item['version'] ?? null;
                                    return $version ? "$tec (Versión $version)" : $tec;
                                }, $cms)
                            );
                        }
                    @endphp
                    <li><span class="font-medium">Dirección IP:</span> {{ $detalles['IP'] ?? 'Desconocido' }}</li>
                    <li><span class="font-medium">País:</span> {{ $detalles['country'] ?? 'Desconocido' }}</li>
                    <li><span class="font-medium">Servidor:</span> {{ $detalles['HTTPServer'] ?? 'Desconocido' }}</li>
                    <li><span class="font-medium">CMS:</span> {{  }}</li>
                    <li><span class="font-medium">Fecha del escaneo:</span> {{ \Carbon\Carbon::parse($escaneo['fecha'])->format('D Y/m/d') }}</li>
                </ul>
            </div>

            <!-- Detalles de Detección -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">DETALLES DE DETECCIÓN</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600">
                    <li><span class="font-medium">Archivos analizados:</span> {{ $detalles['cantidad'] ?? '0' }}</li>
                    <li><span class="font-medium">Archivos maliciosos:</span> {{ $detalles['cantidadIncidentes'] ?? '0' }}</li>
                    <li><span class="font-medium">Archivos limpios:</span> {{ ($detalles['cantidad'] ?? 0) - ($detalles['cantidadIncidentes'] ?? 0) }}</li>
                    <li><span class="font-medium">Enlaces externos detectados:</span> {{ $detalles['external_links_detected'] ?? '0' }}</li>
                    
                    @forelse ($escaneo->resultados as $resultado)
                        <li><span class="font-medium">Información:</span> {{ $resultado->detalle ?? 'No se encontraron detalles' }}</li>
                    @empty
                        <li>No se encontraron resultados</li>
                    @endforelse
                </ul>
                <div class="mt-4">
                    <a href="{{ route('escaneo.show', ['id' => $escaneo->id]) }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ver</a>
                </div>
            </div>

            <!-- Estado de Lista Negra -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">ESTADO DE LISTA NEGRA</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600">
                    <li><span class="font-medium">Quttera Labs:</span> {{ $escaneo['estado_lista_negra']['quttera'] ?? 'Desconocido' }}</li>
                    <li><span class="font-medium">Zeus Tracker:</span> {{ $escaneo['estado_lista_negra']['zeus'] ?? 'Desconocido' }}</li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
