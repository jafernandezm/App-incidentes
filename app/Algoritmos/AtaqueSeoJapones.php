<?php

namespace App\Algoritmos;


use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\MultiRequest;
use GuzzleHttp\Psr7\Request;
//models
use App\Models\Html_infectado;
use App\Models\ListaNegra;
//algoritmos

use App\Algoritmos\BusquedaGoogle;

//composer require guzzlehttp/promises
class AtaqueSeoJapones
{
    public function AtaqueSeoJapones($urls) {
        $busquedaGoogle= new BusquedaGoogle();
        $options = [
            RequestOptions::VERIFY => false,
            RequestOptions::TIMEOUT => 30,
        ];
        $client = new Client($options);    
        //dd($urls);
        $results = [];
        $Urlatacante=[];
        $etiquetamaliciosa=[];
        $body;
        foreach ($urls as $url) {
            try {
                $urlPeticion = $url['url'];
                //dd($urlPeticion);
                $response = $client->request('GET', $urlPeticion,[
                    'headers' => $busquedaGoogle->Header 
                ]);
                //dd($response);
                $html = $response->getBody()->getContents();
                //dd($html);
                $urlsInfectadas = $this->extraUrlsScan($html);
                
                if (count($urlsInfectadas) > 0) {
                   foreach ($urlsInfectadas as $urlInfectada) {
                        $results[] = [
                            'url' => $url['url'],
                            'tipo' => 'url_infectada',
                            'infectada' => $urlInfectada,
                        ];
                    }
                } 
                $htmlInfectados = Html_infectado::all();
                //dd($htmlInfectado);
                $resultados = $this->buscarHtmlInfectado($html, $htmlInfectados);
                //dd($resultados);
                if (count($resultados) > 0) {
                    foreach ($resultados as $resultado) {
                        $results[] = [
                            'url' => $url['url'],
                            'tipo' => 'html_infectado',
                            'infectada' => $resultado,
                        ];
                    }
                }
            } catch (RequestException $e) {
                continue;
            }
        }
        //dd($results);
        return $results;
    }
    function buscarHtmlInfectado($html, $htmlInfectados, $urlResponse) {
        $resultados = [];
        //dd($htmlInfectados);
        foreach ($htmlInfectados as $htmlInfectado) {
            $htmlInfectadoPattern = $htmlInfectado->html_infectado;
            // Verifica si la cadena está presente en el HTML (sensible a mayúsculas y minúsculas)
                 // Asegúrate de que comience con "<"
            if (strpos($htmlInfectadoPattern, '<') !== 0) {
                $htmlInfectadoPattern = '<' . $htmlInfectadoPattern;
            }
            if (strpos($html, $htmlInfectado->html_infectado) !== false) {
                $pattern = "/({$htmlInfectadoPattern}(.*?)(<\/[a-zA-Z]+>))|({$htmlInfectadoPattern}(.*?)(\/?>))/si";
                preg_match($pattern, $html, $htmlinyectado);
                $resultados[] = [
                    'html_infectado' => $htmlInfectado->html_infectado,
                    'html' => $htmlinyectado
                ];
            }
        }
        //dd($resultados);
        return $resultados;
    }
    
    function buscarHtmlInfectado2($html, $htmlInfectados, $urlResponse) {
        $resultados = [];
        foreach ($htmlInfectados as $htmlInfectado) {
            $htmlInfectadoPattern = $htmlInfectado->html_infectado;
    
            // Asegúrate de que comience con "<"
            if (strpos($htmlInfectadoPattern, '<') !== 0) {
                $htmlInfectadoPattern = '<' . $htmlInfectadoPattern;
            }
            
            // Construye un patrón de expresión regular para encontrar el HTML infectado
          // Construye un patrón de expresión regular para encontrar el HTML infectado
            $pattern = "/(" . preg_quote($htmlInfectadoPattern, '/') . ".*?(>|\/>))/si";

            // Encuentra todas las coincidencias
            preg_match_all($pattern, $html, $matches);
    
            if (!empty($matches[0])) {
                $resultados[] = [
                    'tipo' => 'html_infectado',
                    'html_infectado' => $htmlInfectado->html_infectado,
                    'html' => array_unique($matches[0]) // Filtra duplicados
                    //'html' => $matches[0]
                ];
            }
        }
        return $resultados;
    }

    public function extraUrlsScan($html)
    {
        //dd($html);
        $pattern = '/https?:\/\/[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(?=\/|$)/i';
        preg_match_all($pattern, $html, $matches);
        $urls = array_unique($matches[0]);
        //dd($urls);
        $infectedUrls = ListaNegra::whereIn('url', $urls)->get();
        $resultado = [];
        foreach ($infectedUrls as $infectedUrl) {
            $resultado[] = [
                'id' => $infectedUrl->id,
                'url' => $infectedUrl->url,
                'tipo' => $infectedUrl->tipo,
                'fecha' => $infectedUrl->fecha,
                'created_at' => $infectedUrl->created_at,
                'updated_at' => $infectedUrl->updated_at,
            ];
        }
        //dd($resultado);
        return $resultado;
    }


    public function AtaqueSeoJapones2($urls) {
        //dd($urls);
        $busquedaGoogle = new BusquedaGoogle();
        $options = [
            RequestOptions::VERIFY => false,
            RequestOptions::TIMEOUT => 30,
            RequestOptions::ALLOW_REDIRECTS => [
                'track_redirects' => true
            ],
        ];
        $client = new Client($options);
    
        $promises = [];
        foreach ($urls as $url) {
            $urlPeticion = $url['url'];
            $promises[$urlPeticion] = $client->getAsync($urlPeticion, [
                'headers' => $busquedaGoogle->Header
            ]);
        }
    
        $results = [];
        $htmlInfectados = Html_infectado::all();
        //dd($promises);
        $responses = Promise\Utils::settle($promises)->wait();
        //dd($responses);
        foreach ($responses as $url => $response) {
            //sacar la url
            //dd($response);
            $urlResponse = $url;
            //dd($urlResponse);
            if ($response['state'] === 'fulfilled') {
                $responseContent = $response['value'];
                $html = $responseContent->getBody()->getContents();
            
                // Obtener las redirecciones si las hay
                if ($responseContent->hasHeader('X-Guzzle-Redirect-History')) {
                    $redirects = $responseContent->getHeader('X-Guzzle-Redirect-History');
                    
                    // Verificar si hay redirecciones y agregarlas a los resultados si existen
                    if (!empty($redirects)) {
                        $results[] = [
                            'url' => $urlResponse,
                            'tipo' => 'redireccion',
                            'redirecciones' => $redirects,
                        ];
                        // Continuar con la siguiente iteración si hay redirecciones
                       
                    }
                }
                $urlsInfectadas = $this->extraUrlsScan($html);
                //dd($html);
                if (count($urlsInfectadas) > 0) {
                    foreach ($urlsInfectadas as $urlInfectada) {
                        $results[] = [
                            'url' => $url,
                            'tipo' => 'url_infectada',
                            'infectada' => $urlInfectada,
                        ];
                    }
                }
    
                $resultados = $this->buscarHtmlInfectado2($html, $htmlInfectados, $urlResponse);
                //dd($resultados);
                if (count($resultados) > 0) {
                    foreach ($resultados as $resultado) {
                        //dd($resultado);
                        $results[] = [
                            'url' => $url,
                            'tipo' => 'html_infectado',
                            'infectada' => $resultado['html_infectado'],
                            'html' => $resultado['html']
                        ];
                    }
                }
            } else {
                // Manejar el error de la solicitud si es necesario
                // Puedes agregar lógica aquí para registrar o manejar los errores
            }
        }
        return $results;
    }
}



//xml
