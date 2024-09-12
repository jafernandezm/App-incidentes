<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//algoritmos
use App\Algoritmos\BusquedaGoogle;
use App\Algoritmos\AtaqueSeoJapones;
//Resultados_Escaneos
use App\Models\Resultados_Escaneos;
use App\Models\Escaneos;
//Request 
use App\Http\Requests\PasivoRequest;

class PasivoScanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('pasivo.index');
    }

    public function scanWebsite(PasivoRequest $request)
    {
        $Busqueda = new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();
        $numResultsControl = $request->cantidad;
        $dorks = $request->dorks;
        $query = trim($dorks);
        if (!empty($request->excludeSitesHidden)) {
            $excludedSites = array_map(function ($site) {
                return '-site:' . trim($site);
            }, explode(',', $request->excludeSitesHidden));
            $query .= ' ' . implode(' ', $excludedSites);
        }
        $resutaldos = $Busqueda->googleSearch($queries = [$query], $timeout = 30, $numResults = $numResultsControl);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones($resutaldos);
        $contadoResultado = count($ataqueSeoJapones);
        $escaneo = new Escaneos;
        $escaneo->url = $request->dorks;
        $escaneo->tipo = 'PASIVO';
        $escaneo->fecha = date('Y-m-d H:i:s');
        $escaneo->resultado = $contadoResultado;
        $escaneo->save();
        $resultados = new Resultados_Escaneos();
        $resultados->escaneo_id = $escaneo->id;
        $resultados->url = $request->dorks;
        $resultados->detalle = 'Ataque SEO Japones';
        $resultados->data = json_encode($ataqueSeoJapones);
        $resultados->save();
        $escaneo = Escaneos::where('id', $escaneo->id)->first();
        return view('pasivo.index', [
            'escaneo' => $escaneo
        ]);
    }

    
}