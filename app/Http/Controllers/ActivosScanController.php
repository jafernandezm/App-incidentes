<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\BaseController;
//algoritmos
use App\Algoritmos\AtaqueSeoJapones;
use App\Algoritmos\BusquedaGoogle;

class ActivosScanController extends Controller
{
    public function index()
    {
        return view('activo.index');
    }

    public function scanWebsite(Request $request)
    {
        // Obtén la URL del formulario
        $url = $request->input('url');
        
        // Verifica si la URL es válida
        $Busqueda= new BusquedaGoogle();
        $ataqueSeoJapones = new AtaqueSeoJapones();

        $query= ['site:' . $url];
        
        $resutaldos = $Busqueda->googleSearch($url, $queries=$query);
        //dd($resutaldos);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones2($resutaldos);
        dd($ataqueSeoJapones);
        return view( 'scan.index');
    }
    

  

  

}