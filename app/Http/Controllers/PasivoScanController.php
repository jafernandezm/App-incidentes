<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Dorks
use App\Models\Dorks;

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
        #validar datos dorks y cantida
    }
    public function index()
    {
        $resultados = Resultados_Escaneos::all();
        $resultados = $resultados->sortByDesc('created_at');
        //array de resultados
        $resultados = $resultados->toArray();
        //dd($resultados);
        return view('pasivo.index', [
            //'pasivos' => $pasivos
        ]);
    }
    public function scanWebsite(PasivoRequest $request){
        $validated = $request->validated();
        $Busqueda= new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();
        $numResultsControl = $request->cantidad;
        $dorks = $request->dorks;
        $query = trim($dorks);
        $resutaldos = $Busqueda->googleSearch( $queries=[$query], $timeout = 30, $numResults = $numResultsControl);
        
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones2($resutaldos);
        //dd($ataqueSeoJapones);
        $contadoResultado = count($ataqueSeoJapones);
        //guardar en la base de datos
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
        $resultados = Resultados_Escaneos::where('escaneo_id', $escaneo->id)->get();
        //dd($resultados);
        return view('pasivo.index', [
            'resultados' => $resultados
        ]);
    }

}
