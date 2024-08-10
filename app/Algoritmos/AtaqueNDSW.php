<?php

namespace App\Algoritmos;

use GuzzleHttp\Client;

use Log;
class AtaqueNDSW {




    function verificarWordpress($url)
    {
        $api = 'https://sitecheck.sucuri.net/api/v3/?scan=';
        $response = file_get_contents($api . $url);
        $data = json_decode($response);
    
        // Asegúrate de que la decodificación fue exitosa
        if ($data === null) {
            return 'Error al decodificar la respuesta';
        }
        //dd($data);
        // Verifica si existe el dato esperado y si es WordPress
        if (isset($data->software->cms[0]->name) && $data->software->cms[0]->name === 'WordPress') {
            $respuesta = [
                'wp-includes' => $data->links->js_local,
                'url_final' => $data->site->final_url,
            ];
            return $respuesta;
        } else {
            return 'No es WordPress';
        }
    }

    public function verificarNDSW($url) {
        $wordpress = $this->verificarWordpress($url);
    
        if ($wordpress === 'No es WordPress') {
            return $wordpress;
        }
    
        $url_final = $wordpress['url_final'];
        $jsFiles = $wordpress['wp-includes'];
    
        $this->verificarArchivosJs($url_final, $jsFiles);
    }
    
    private function verificarArchivosJs($urlBase, array $jsFiles) {
        foreach ($jsFiles as $jsFile) {
            $this->verificarArchivoJs($urlBase, $jsFile);
        }
    }
    
    private function verificarArchivoJs($urlBase, $jsFilePath) {
        $client = new Client();
        $jsUrl = $urlBase . $jsFilePath;
    
        try {
            $jsContent = $this->descargarContenido($jsUrl);
    
            if ($this->contieneNDSW($jsContent)) {
                echo "El contenido 'ndsw===undefined' se encuentra en: " . $jsUrl . "\n";
            } else {
                echo "El contenido 'ndsw===undefined' NO se encuentra en: " . $jsUrl . "\n";
            }
        } catch (\Exception $e) {
            Log::error("Error al acceder a: $jsUrl - " . $e->getMessage());
            echo "No se pudo acceder a: " . $jsUrl . " - " . $e->getMessage() . "\n";
        }
    }
    
    private function descargarContenido($url) {
        $client = new Client();
        $response = $client->get($url);
        return (string) $response->getBody();
    }
    
    private function contieneNDSW($content) {
        return strpos($content, 'ndsw===undefined') !== false;
    }
}