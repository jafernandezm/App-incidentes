@props(['resultado'])

<div class="mb-6 p-6 border rounded-lg bg-white shadow">
    <div class="mb-4">
        <p class="text-lg font-semibold text-gray-800"><strong>URL:</strong> {{ $resultado['url'] ?? 'N/A' }}</p>
        <p class="text-lg font-semibold text-gray-800"><strong>Detalle:</strong> {{ $resultado['detalle'] ?? 'N/A' }}</p>
        <p class="text-lg font-semibold text-gray-800"><strong>Fecha de Creación:</strong> {{ $resultado['created_at'] ?? 'N/A' }}</p>
        <p class="text-lg font-semibold text-gray-800"><strong>Fecha de Actualización:</strong> {{ $resultado['updated_at'] ?? 'N/A' }}</p>
    </div>

    @php
        $data = json_decode($resultado['data'], true);
    @endphp

    @if (is_array($data))
        @foreach ($data as $item)
            <div class="mb-4 p-4 border rounded-lg bg-gray-50">
                <p class="text-lg font-semibold text-gray-800"><strong>URL:</strong> {{ $item['URL de origen'] ?? 'N/A' }}</p>
                <p class="text-lg font-semibold text-gray-800"><strong>Tipo:</strong> {{ $item['tipo'] ?? 'N/A' }}</p>

                <ul class="list-disc pl-5 mt-2 space-y-2">
                    @foreach ($item as $key => $value)
                        @if (is_array($value))
                            <li>
                                <strong>{{ ucfirst($key) }}:</strong>
                                <ul class="list-disc pl-5 mt-2 space-y-1">
                                    @foreach ($value as $subKey => $subValue)
                                        <li>{{ ucfirst($subKey) }}: {{ $subValue }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endif
</div>
