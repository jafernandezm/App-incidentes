<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\BaseController;
//algoritmos
use App\Algoritmos\AtaqueSeoJapones;
use App\Algoritmos\AtaqueNDSW;
use App\Algoritmos\BusquedaGoogle;
// modelos
use App\Models\Resultados_Escaneos;
use App\Models\Escaneos;

class ActivosScanController extends Controller
{
    public function index()
    {
        return view('activo.index');
    }

    public function scanWebsite(Request $request)
    {
        $url = $request->input('url');
        // Verifica si la URL es válida
        $Busqueda = new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();
        $query = ['site:' . $url];
        //dd($query);
        $resutaldos = $Busqueda->googleSearch($queries = $query);
        //dd($resutaldos);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones2($resutaldos);
        //dd($ataqueSeoJapones);
        $contadoResultado = count($ataqueSeoJapones);

        //guardar en la base de datos
        $escaneo = new Escaneos;
        //url
        if($contadoResultado >0){
        $escaneo->url = $url;
        $escaneo->tipo = 'ACTIVO';
        $escaneo->fecha = date('Y-m-d H:i:s');
        $escaneo->resultado = $contadoResultado;
        $escaneo->save();

        $resultados = new Resultados_Escaneos();
        $resultados->escaneo_id = $escaneo->id;
        $resultados->url = $url;
        $resultados->detalle = 'Ataque SEO Japones';
        $resultados->data = json_encode($ataqueSeoJapones);
        $resultados->save();
        }else {
            $ataqueNDSW = new AtaqueNDSW();
            $resutaldo = $ataqueNDSW->verificarNDSW($url);
        }
        $resultado = Resultados_Escaneos::where('escaneo_id', $escaneo->id)->get();
        // Definir el mensaje si no se encontraron resultados



        $message = $resultado->isEmpty() ? 'No se encontraron resultados.' : '';

        return view('activo.index', [
            'resultados' => $resultado,
            'message' => $message
        ]);
        
    }
}
