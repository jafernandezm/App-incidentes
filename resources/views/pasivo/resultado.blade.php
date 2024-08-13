<x-app-layout>
    @section('content')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-gray-100 shadow-md rounded-lg px-6 py-4 mb-6 border border-gray-300">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Resultados del Escaneo para https://cmt.gob.bo:443</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">PARÁMETROS DEL ESCANEO</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li><span class="font-medium">Dirección IP:</span> 31.220.99.242</li>
                        <li><span class="font-medium">País:</span> Estados Unidos</li>
                        <li><span class="font-medium">Servidor:</span> nginx</li>
                        <li><span class="font-medium">CMS:</span> WordPress</li>
                        <li><span class="font-medium">Fecha del escaneo:</span> Lun 2024/08/12 19:18</li>
                    </ul>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">DETALLES DE DETECCIÓN</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li><span class="font-medium">Archivos maliciosos:</span> 0</li>
                        <li><span class="font-medium">Archivos sospechosos:</span> 0</li>
                        <li><span class="font-medium">Archivos potencialmente sospechosos:</span> 0</li>
                        <li><span class="font-medium">Archivos limpios:</span> 98</li>
                        <li><span class="font-medium">Enlaces externos detectados:</span> 384</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">ESTADO DE LISTA NEGRA</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li><span class="font-medium">Quttera Labs:</span> Limpio</li>
                        <li><span class="font-medium">Zeus Tracker:</span> Limpio</li>
                    </ul>
                </div>
            </div>
        </div>
    
    </div>
    
    

    
    @endsection
</x-app-layout>
