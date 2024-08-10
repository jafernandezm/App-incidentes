<div class="mt-4 flex flex-col justify-center items-center p-4 rounded-lg shadow-md space-y-2">
    <h1 class="text-2xl font-bold text-center">Escanear</h1>
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md white:bg-gray-800">
        <form method="POST" action="{{ route('pasivo.scanWebsite') }}">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div class="flex items-center mb-4">
                    <label class="text-gray-700" for="cantidad">Cantidad de páginas</label>
                    <input id="cantidad" type="number" name="cantidad"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none"
                        value="10">
                </div>
                <div class="flex items-center mb-4">
                    <label class="text-gray-700 mr-2" for="excludeSites">Excluir sitios</label>
                    <div class="flex-grow flex items-center">
                        <input id="excludeSites" type="text" name="excludeSites"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-l-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none">
                        <button id="addButton"
                            class="px-4 py-2 text-white bg-blue-500 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Agregar
                        </button>
                    </div>
                </div>
                <div class="flex items-center mb-4">
                    <label class="text-gray-700 mr-2" for="dorks">Dorks</label>
                    <input id="dorks" type="text" name="dorks"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none"
                        placeholder="site:gob.bo">
                </div>
            </div>
            <!-- Campo oculto para almacenar los sitios a excluir -->
            <input type="hidden" id="excludeSitesHidden" name="excludeSitesHidden">

            <!-- Lista para mostrar los sitios a excluir -->
            <ul id="excludeSitesList" class="exclude-sites-list mt-4"></ul>

            <div class="flex justify-end mt-6">
                <button
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-500 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Enviar</button>
            </div>
        </form>
    </section>
</div>
