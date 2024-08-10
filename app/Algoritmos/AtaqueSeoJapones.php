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
    function buscarHtmlInfectado2($html, $htmlInfectados, $urlResponse)
    {
        $resultados = [];
        foreach ($htmlInfectados as $htmlInfectado) {
            $htmlInfectadoPattern = $htmlInfectado->html_infectado;
            if (strpos($htmlInfectadoPattern, '<') !== 0) {
                $htmlInfectadoPattern = '<' . $htmlInfectadoPattern;
            }
            $pattern = "/(" . preg_quote($htmlInfectadoPattern, '/') . ".*?(>|\/>))/si";
            preg_match_all($pattern, $html, $matches);
            if (!empty($matches[0])) {
                //dd($html);
                $resultados[] = [
                    'tipo' => 'html_infectado',
                    'html_infectado' => $htmlInfectado->html_infectado,
                    'html' => array_unique($matches[0])
                ];
            }
        }
        return $resultados;
    }
    public function extraUrlsScan($html)
    {
        $pattern = '/https?:\/\/[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(?=\/|$)/i';
        preg_match_all($pattern, $html, $matches);
        $urls = array_unique($matches[0]);
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
        return $resultado;
    }

    private function normalizeDomain($url)
    {
        $parsedUrl = parse_url($url);
        $host = $parsedUrl['host'] ?? '';
        return preg_replace('/^www\./', '', $host);
    }
    
    public function AtaqueSeoJapones2($urls)
    {
        $busquedaGoogle = new BusquedaGoogle();
        $client = new Client([
            RequestOptions::VERIFY => false,
            RequestOptions::TIMEOUT => 30,
            RequestOptions::ALLOW_REDIRECTS => ['track_redirects' => true],
        ]);
        $promises = [];
        foreach ($urls as $url) {
            $promises[$url['url']] = $client->getAsync($url['url'], [
                'headers' => $busquedaGoogle->Header
            ]);
        }
        $results = [];
        $htmlInfectados = Html_infectado::all();
        $responses = Promise\Utils::settle($promises)->wait();
        foreach ($responses as $url => $response) {
            if ($response['state'] === 'fulfilled') {
                $responseContent = $response['value'];
                $html = $responseContent->getBody()->getContents();
                $redirects = $responseContent->getHeader('X-Guzzle-Redirect-History');
                $urlResponse = $redirects[0] ?? $url;
                if (!empty($redirects)) {
                    $domain = $this->normalizeDomain($url);
                    $uniqueRedirects = [];
                    foreach ($redirects as $redirect) {
                        $redirectDomain = $this->normalizeDomain($redirect);
                        if ($redirectDomain !== $domain && !in_array($redirect, $uniqueRedirects)) {
                            $uniqueRedirects[] = $redirect;
                            $results[] = [
                                'URL de origen' => $url,
                                'URL original' => $url,
                                'url' => $urlResponse,
                                'tipo' => 'redireccion',
                                'redirecciones' => $redirects,
                            ];
                        }
                    }
                } else {
                    $urlsInfectadas = $this->extraUrlsScan($html);
                    foreach ($urlsInfectadas as $urlInfectada) {
                        $results[] = [
                            'url' => $url,
                            'tipo' => 'url_infectada',
                            'infectada' => $urlInfectada,
                        ];
                    }
                    $resultados = $this->buscarHtmlInfectado2($html, $htmlInfectados, $urlResponse);
                    foreach ($resultados as $resultado) {
                        $results[] = [
                            'url' => $url,
                            'tipo' => 'html_infectado',
                            'infectada' => $resultado['html_infectado'],
                            'html' => $resultado['html']
                        ];
                    }
                }
            }
        }    
        return $results;
    }


}
