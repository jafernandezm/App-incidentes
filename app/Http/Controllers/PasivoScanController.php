<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Dorks
use App\Models\Dorks;

//algoritmos
use App\Algoritmos\BusquedaGoogle;
use App\Algoritmos\AtaqueSeoJapones;

class PasivoScanController extends Controller
{
    
    public function index()
    {
        return view('dashboard', [
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
        $numResultsControl=20;
     
    
        $resutaldos = $Busqueda->googleSearch( $queries=$query, $timeout = 30, $numResults = $numResultsControl);
        //dd($resutaldos);
        $ataqueSeoJapones = $ataqueSeoJapones->AtaqueSeoJapones2($resutaldos);
        //dd($ataqueSeoJapones);

        return view('pasivo.index', [
            'resultados' => $ataqueSeoJapones
        ]);
    }

}
