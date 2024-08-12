<?php
namespace App\Algoritmos;
class SucuriEscaner
{
    function apiSucuri($url)
    {
        //https://sitecheck.sucuri.net/api/v3/?scan=
        $api = 'https://sitecheck.sucuri.net/api/v3/?scan=';
        $response = file_get_contents($api . $url);
        $responseJson = json_decode($response);
        dd($responseJson);
        return $responseJson;
    }

    function SucuriEscaner($url)
    {
        $api = $this->apiSucuri($url);
    }
}







