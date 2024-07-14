<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\BaseController;
//algoritmos
use App\Algoritmos\AtaqueSeoJapones;
use App\Algoritmos\BusquedaGoogle;
// modelos
use App\Models\Resultados_Escaneos;
use App\Models\Escaneos;
class ActivosScanController extends Controller
{
    public function index()
    {
        $resultado = Resultados_Escaneos::all();
        $resultado = $resultado->sortByDesc('created_at');
        //array de resultados
        $resultado = $resultado->toArray();

        //dd($resultado);
        return view('activo.index',[
            'resultados' => $resultado
        ]);
    }

    public function scanWebsite(Request $request)
    {
        // Obtén la URL del formulario
        $url = $request->input('url');
        
        // Verifica si la URL es válida
        $Busqueda= new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();

        $query= ['site:' . $url];
        //dd($query);
        $resutaldos = $Busqueda->googleSearch($queries=$query);
        //dd($resutaldos);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones2($resutaldos);
        //dd($ataqueSeoJapones);
        $contadoResultado = count($ataqueSeoJapones);
        //guardar en la base de datos
        $escaneo = new Escaneos;
        $escaneo->escaneo_id = Str::uuid();
        //url
        $escaneo->url = $url;
        $escaneo->tipo = 'ACTIVO';
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
        // que devuelva solo el $escaneo->escaneo_id
        //$escaneoId = intval($escaneo->escaneo_id);

        $resultado = Resultados_Escaneos::All();
        return view( 'activo.index',[
            'resultados' => $resultado
        ]);
    }
    

  

  

}