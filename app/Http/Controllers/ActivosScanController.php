<?php

namespace App\Http\Controllers;

//algoritmos
use App\Algoritmos\AtaqueSeoJapones;
use App\Algoritmos\AtaqueNDSW;
use App\Algoritmos\BusquedaGoogle;
//escaner
use App\Algoritmos\escaners\SucuriEscaner;
use App\Algoritmos\escaners\Bitdefender;
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
        //dd($ataqueNDSWResutaldo);
        $contadoResultadoNDSW = isset($ataqueNDSWResutaldo['results']) && is_array($ataqueNDSWResutaldo['results'])
        ? count($ataqueNDSWResutaldo['results'])
        : 0;
        $contadorTotal = $contadoResultadoSeoJapones + $contadoResultadoNDSW;
        $escaneo = new Escaneos;
        $escaneo->url = $url;
        $escaneo->tipo = 'ACTIVO';
        $escaneo->fecha = now();
        $escaneo->detalles= json_encode($ataqueNDSWResutaldo['data']) ?? '';

        $escaneo->resultado = $contadorTotal;
        $escaneo->save();
        
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
            $resultados->data = json_encode($ataqueNDSWResutaldo['results']);
            $resultados->save();
        }
        $resultado = Resultados_Escaneos::where('escaneo_id', $escaneo->id)->get();

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
