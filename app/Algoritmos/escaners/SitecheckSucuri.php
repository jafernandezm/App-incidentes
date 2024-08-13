<?php

namespace App\Algoritmos\escaners;
use Illuminate\Support\Facades\Http;

class SitecheckSucuri
{
   
    public function apiSuciri($url)
    {
        $api = 'https://sitecheck.sucuri.net/api/v3/?scan=' . urlencode($url);
    
        // Configura el tiempo de espera en 300 segundos (5 minutos)
        $response = Http::timeout(50)->get($api);
    
        if ($response->failed()) {
            return 'Error en la solicitud: ' . $response->status();
        }
    
        $data = $response->json();
    
        if (isset($data['software']['cms'][0]['name']) && $data['software']['cms'][0]['name'] === 'WordPress') {
            return [
                'wp-includes' => $data['links']['js_local'] ?? [],
                'url_final' => $data['site']['final_url'] ?? '',
                'software' => $data['software']['cms'] ?? [],
            ];
        }
    
        return [];
    }
    

}