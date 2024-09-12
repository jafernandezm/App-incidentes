@props(['resultado'])

{{-- {{dd($resultado)}} --}}
<style>
    .card {
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.details {
    max-height: 300px; /* Ajusta según sea necesario */
    overflow-y: auto;
    word-break: break-word;
}

.card-header p {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


/* Estilos generales para el contenedor de código */
pre {
    background-color: #000; /* Fondo negro */
    color: #fff; /* Texto blanco */
    padding: 1em;
    border-radius: 5px;
    overflow-x: auto;
    white-space: pre-wrap; /* Asegura que el contenido se ajuste en varias líneas */
}

/* Estilos específicos para el código HTML */
code.language-html {
    color: #ff7f7f; /* Color claro para el código HTML */
}

/* Estilos específicos para el código JavaScript */
code.language-javascript {
    color: #f0e68c; /* Color amarillo claro para el código JavaScript */
}




/* https:://pixeldrain.com */
</style>


<!-- Prism.js CSS -->
{{-- {{dd($resultado)}} --}}

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 p-6">
    @php
        $data = json_decode($resultado['data'], true);
    @endphp

    @if (is_array($data))
        @foreach ($data as $item)
            <div class="card bg-gray-50 border border-gray-200 rounded-lg p-4 cursor-pointer transition-all duration-300 ease-in-out hover:bg-gray-100 hover:shadow-lg overflow-hidden">
                <div class="card-header flex flex-col space-y-2 mb-4">
                    <p class="text-lg font-semibold text-gray-800"><strong>URL:</strong> {{ $item['URL_ORIGEN'] ?? 'N/A' }}</p>
                    <p class="text-sm font-medium text-gray-600"><strong>Tipo:</strong> {{ $item['tipo'] ?? 'N/A' }}</p>
                </div>
                <div class="details hidden mt-4 space-y-2">
                    <ul class="list-disc pl-5">
                        @foreach ($item as $key => $value)
                        <li class="mb-4"> <!-- Margen inferior entre ítems -->
                            <strong class="text-lg">{{ ucfirst($key) }}:</strong> <!-- Tamaño de texto más grande para el título -->
                            @if ($key === 'html_infectado' || $key === 'html') <!-- Verifica si la clave es 'html_infectado' -->
                                <div class="bg-gray-200 text-white p-4 ">
                                    <pre class="whitespace-pre-wrap ">
                                        <code class="language-html">
                                            {!! htmlspecialchars(is_array($value) ? implode("\n", $value) : $value, ENT_QUOTES, 'UTF-8') !!}
                                        </code>
                                    </pre>
                                </div>
                            @elseif (is_string($value) && (strpos($value, 'selector') !== false || strpos($value, 'return') !== false || strpos($value, 'function') !== false))
                                <div class="bg-gray-200 text-black p-4 rounded-md overflow-auto mt-2 text-sm font-mono max-w-full">
                                    <pre class="whitespace-pre-wrap">
                                        <code class="language-javascript">
                                            {{ is_array($value) ? implode("\n", $value) : $value }}
                                        </code>
                                    </pre>
                                </div>
                            @else
                                <div class="bg-transparent mt-2 text-sm font-mono text-gray-800">
                                    {{ is_array($value) ? implode("\n", $value) : $value }}
                                </div>
                            @endif
                        </li>
                    @endforeach
                    
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>

<!-- JavaScript para manejar la expansión de las tarjetas -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                const details = card.querySelector('.details');
                if (details) {
                    // Toggle visibility of details
                    details.classList.toggle('hidden');
                }
            });
        });
    });
</script>
