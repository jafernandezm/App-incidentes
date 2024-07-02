<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\TransferStats;
use GuzzleHttp\RequestOptions;

// Guzzle
use GuzzleHttp\Client;

//models
use App\Models\Base;
use App\Models\ListaNegra;
use App\Models\Html_infectado;
class BaseController extends Controller
{
    //  //como creo una variable global var proxy=['https://thingproxy.freeboard.io/fetch/']
    //  private $proxy = [
    //     'https://thingproxy.freeboard.io/fetch/',
    //     'https://cors-anywhere.herokuapp.com/'
    // ];
    // private $Header = [
    //     'Upgrade-Insecure-Requests' => '1',
    //     'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/115.0',
    //     'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    //     'Accept-Language' => 'en-US,en;q=0.5',
    //     'Accept-Encoding' => 'gzip, deflate, br',
    //     'Referer' => 'https://www.google.com/',
    //     'Te' => 'trailers',
    //     'Sec-Fetch-Dest' => 'document',
    //     'Sec-Fetch-Mode' => 'navigate',
    //     'Sec-Fetch-Site' => 'cross-site',
    // ];
    // private $options = [
    //     RequestOptions::VERIFY => false,
    //     RequestOptions::TIMEOUT => 20,
    // ];
    // private $AtaquesHeader=[
    //     'Location',
    // ];
    // private $AtaqueEtiquetas=[
    //     'lang="ja"',
    //     'meta http-equiv="refresh"',
    // ];


    // function googleSearch($baseUrl = "", $queries = [], $proxyList = [], $timeout = 20, $numResults = 10) {
    //     $options = [
    //         RequestOptions::VERIFY => false,
    //         RequestOptions::TIMEOUT => $timeout,
    //     ];
    //     if (!empty($proxyList)) {
    //         $options[RequestOptions::PROXY] = $proxyList[0];
    //     }
    //     $client = new Client($options);
    //     $results = [];
        
    //     foreach ($queries as $query) {
    //         $query = str_replace(' ', '%20', $query);
    //         $url = 'https://www.google.com/search?q=' . $query . '&num=' . $numResults;
    
    //         if (!empty($proxyList)) {
    //             $url = $proxyList[1] . $url;
    //         }
    
    //         try {
    //             $response = $client->request('GET', $url, [
    //                 'headers' => [
    //                     'origin' => 'x-requested-with',
    //                 ],
    //             ]);
    //             $content = $response->getBody()->getContents();
    
    //             $dom = new \DOMDocument();
    //             @$dom->loadHTML($content);
    
    //             $links = $dom->getElementsByTagName('a');
    //             foreach ($links as $link) {
    //                 $href = $link->getAttribute('href');
                    
    //                 if (strpos($href, '/url?q=') === 0) {
    //                     $href = substr($href, strlen('/url?q='));
    //                     $href = urldecode($href);
    //                     $href = preg_replace('/&sa=.*$/i', '', $href);
    
    //                     if (strpos($href, 'google.com') !== false || preg_match('/\.(pdf|img)$/i', $href)) {
    //                         continue;
    //                     }
    
    //                     $titleElement = $link->getElementsByTagName('div')->item(0);
    //                     $title = $titleElement ? $titleElement->nodeValue : '';
    
    //                     $relatedDataElement = $link->parentNode->parentNode->getElementsByTagName('div')->item(1);
    //                     $relatedData = $relatedDataElement ? $relatedDataElement->nodeValue : '';
    
    //                     $results[] = [
    //                         'query' => $query,
    //                         'url' => $href,
    //                         'titulo' => $title,
    //                         'related_data' => $relatedData,
    //                     ];
    //                 }
    //             }
    //         } catch (RequestException $e) {
    //             // Log the error instead of echoing it to avoid disrupting the flow
    //             error_log('Request failed: ' . $e->getMessage());
    //         }
    //     }
    //     //quitar el primero 
    //     $results = array_slice($results, 6);
    //     //dd($results);
    //     return $results;
    // }


    // function AtaqueSeoJapones($urls) {
    //     $options = [
    //         RequestOptions::VERIFY => false,
    //         RequestOptions::TIMEOUT => 30,
    //     ];
    //     $client = new Client($options);    
    //     //dd($urls);
    //     $results = [];
    //     $Urlatacante=[];
    //     $etiquetamaliciosa=[];
    //     $body;
    //     foreach ($urls as $url) {
    //         try {
    //             $urlPeticion = $url['url'];
    //             //dd($urlPeticion);
    //             $response = $client->request('GET', $urlPeticion,[
    //                 'headers' => $this->Header 
    //             ]);
    //             //dd($response);
    //             $html = $response->getBody()->getContents();
    //             //dd($html);
    //             $urlsInfectadas = $this->extraUrlsScan($html);
                
    //             $htmlInfectados = Html_infectado::all();
    //             //dd($htmlInfectado);
    //             $resultados = $this->buscarHtmlInfectado($html, $htmlInfectados);

    //            if($hasRedirect == true){
    //                 $results[] = [
    //                     'url' => $url['url'],
    //                     'redirect_url' =>  $Urlatacante,
    //                     'response' => $dom,
    //                     'etiqueta atacante' => $etiquetamaliciosa
    //                 ];
    //            }
    //         } catch (RequestException $e) {
    //             continue;
    //         }
    //     }
    //    // dd($results);
    //     return $results;
    // }

    // function buscarHtmlInfectado($html, $htmlInfectados) {
    //     $resultados = [];
    //     //dd($htmlInfectados);
    //     foreach ($htmlInfectados as $htmlInfectado) {
    //         // Verifica si la cadena está presente en el HTML (sensible a mayúsculas y minúsculas)
            
    //         //dd($htmlInfectado->html_infectado);
    //         if (strpos($html, $htmlInfectado->html_infectado) !== false) {
    //             $resultados[] = $htmlInfectado->html_infectado;
    //         }
    //     }
    //     //dd($resultados);
    //     return $resultados;
    // }
    

    // public function extraUrlsScan($html)
    // {
    //     //dd($html);
    //     $pattern = '/https?:\/\/[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(?=\/|$)/i';
    //     preg_match_all($pattern, $html, $matches);
    //     $urls = array_unique($matches[0]);
    //     //dd($urls);
    //     $infectedUrls = ListaNegra::whereIn('url', $urls)->get();
    //     $resultado = [];
    //     foreach ($infectedUrls as $infectedUrl) {
    //         $resultado[] = [
    //             'id' => $infectedUrl->id,
    //             'url' => $infectedUrl->url,
    //             'tipo' => $infectedUrl->tipo,
    //             'fecha' => $infectedUrl->fecha,
    //             'created_at' => $infectedUrl->created_at,
    //             'updated_at' => $infectedUrl->updated_at,
    //         ];
    //     }
    //     //dd($resultado);
    //     return $resultado;
    // }
}
