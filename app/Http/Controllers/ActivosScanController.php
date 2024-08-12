<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
//algoritmos
use App\Algoritmos\AtaqueSeoJapones;
use App\Algoritmos\AtaqueNDSW;
use App\Algoritmos\BusquedaGoogle;
use App\Algoritmos\SucuriEscaner;
// modelos
use App\Models\Resultados_Escaneos;
use App\Models\Escaneos;
use App\Models\Incidente;
//validaciones
use App\Http\Requests\ActivoRequest;
class ActivosScanController extends Controller
{
    public function index()
    {
        return view('activo.index');
    }

    public function scanWebsite(ActivoRequest $request)
    {
        $protocol = $request->input('protocol');
        $url = $request->input('url');
        $url = $protocol . '://' . $url;

        //dd($url);
        $sucuriEscaner = new SucuriEscaner();
        $sucuriEscaner->SucuriEscaner($url);
        dd($sucuriEscaner);


        $Busqueda = new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();
        $incidenteDorks = Incidente::where('tipo_id', 4)->get();
        $urlcompleta= 'site:'.$url;
        foreach ($incidenteDorks as $incidente) {
            $query = $incidente->contenido;
            $query = $urlcompleta.' '.$query;
            $queries[] = $query; // Almacena la query procesada en el array
        }
        $resutaldos = $Busqueda->googleSearch($queries = $queries);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones($resutaldos);
        $contadoResultadoSeoJapones = count($ataqueSeoJapones);
        $ataqueNDSW = new AtaqueNDSW();
        $ataqueNDSWResutaldo = $ataqueNDSW->ataqueNDSW($url);
        $contadoResultadoNDSW = count($ataqueNDSWResutaldo);
        $contadorTotal = $contadoResultadoSeoJapones + $contadoResultadoNDSW;
        //dd($ataqueNDSWResutaldo);
        $escaneo = new Escaneos;
        $escaneo->url = $url;
        $escaneo->tipo = 'ACTIVO';
        $escaneo->fecha = now();
        $escaneo->resultado = $contadorTotal;
        $escaneo->save();

        //dd($ataqueNDSWResutaldo)   ;
        if($contadoResultadoSeoJapones >0){
            $resultados = new Resultados_Escaneos();
            $resultados->escaneo_id = $escaneo->id;
            $resultados->url = $url;
            $resultados->detalle = 'Ataque SEO Japones';
            $resultados->data = json_encode($ataqueSeoJapones);
            $resultados->save();
        }
        if($contadoResultadoNDSW >0){
            $resultados = new Resultados_Escaneos();
            $resultados->escaneo_id = $escaneo->id;
            $resultados->url = $url;
            $resultados->detalle = 'Ataque NDSW';
            $resultados->data = json_encode($ataqueNDSWResutaldo);
            $resultados->save();
        }
        $resultado = Resultados_Escaneos::where('escaneo_id', $escaneo->id)->get();
        // Verifica si la colección está vacía y establece el mensaje correspondiente
        $message = $resultado->isEmpty() ? 'No se encontraron resultados.' : '';
        if ($message !== '') {
            return redirect()->back()->with('error', 'No se encontraron resultados.');
        }
        //dd($message);
        return view('activo.index', [
            'resultados' => $resultado,
        ]);
    }

    
}
