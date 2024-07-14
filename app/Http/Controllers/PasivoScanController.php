<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
//Dorks
use App\Models\Dorks;

//algoritmos
use App\Algoritmos\BusquedaGoogle;
use App\Algoritmos\AtaqueSeoJapones;
//Resultados_Escaneos
use App\Models\Resultados_Escaneos;
use App\Models\Escaneos;
class PasivoScanController extends Controller
{
    
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
    public function scanWebsite(){
        $Busqueda= new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();
        //dorks
        $dorks = Dorks::all();
        $query = $dorks->pluck('dork')->toArray();
        //dd($query);
        $numResultsControl=40;
     
    
        $resutaldos = $Busqueda->googleSearch( $queries=$query, $timeout = 30, $numResults = $numResultsControl);
        //dd($resutaldos);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones2($resutaldos);
        //dd($ataqueSeoJapones);
        //dd($ataqueSeoJapones);
        // Valores predeterminados para los campos
        $contadoResultado = count($ataqueSeoJapones);
        //guardar en la base de datos
        $escaneo = new Escaneos;

        $escaneo->escaneo_id = Str::uuid()->toString();
        $escaneo->url = 'Busqueda Google';
        $escaneo->tipo = 'PASIVO';
        $escaneo->fecha = date('Y-m-d H:i:s');
        $escaneo->resultado = $contadoResultado;
        $escaneo->save();  
        // Guardamos los resultados en la base de datos uno por uno
        foreach ($ataqueSeoJapones as $resultado) {
            //dd($resultado['infectada']);
            $resultados = new Resultados_Escaneos();
            $resultados->escaneo_id = $escaneo->id;
            $resultados->url = $resultado['url'];
            $resultados->infectada = isset($resultado['infectada']) ? json_encode($resultado['infectada']) : null;
            
            $resultados->html_infectado = isset($resultado['infectada']) ? json_encode($resultado['infectada']) : null;;

            $resultados->html = isset($resultado['html']) ? json_encode($resultado['html']) : null;

            $resultados->redirecciones = isset($resultado['redirecciones']) ? json_encode($resultado['redirecciones']) : null;

            $resultados->detalle = $resultado['detalle'] ?? null;
            $resultados->tipo = $resultado['tipo'] ?? null;
            $resultados->save();
        }
        // Ejemplo de consulta para obtener todos los resultados
        
        $resultados = Resultados_Escaneos::all();
        //dd($resultados);
        return view('pasivo.index', [
            'resultados' => $resultados
        ]);
    }

}
