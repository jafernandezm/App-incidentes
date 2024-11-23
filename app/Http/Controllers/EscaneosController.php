<?php

namespace App\Http\Controllers;

use App\Models\Escaneos;
use Illuminate\Http\Request;


//models
use App\Models\Resultados_Escaneos;
use App\Models\datos_filtrados;
//ESCANEO


class EscaneosController extends Controller
{
    public function enviar(Request $request)
    {
       
        $tipo = $request->input('tipo');
        //dd($tipo);
        if ($tipo == 'filtraciones') {
            $uuid = $request->input('uuid');

            $datosFiltrados = datos_filtrados::where('escaneo_id', $uuid)->get()->toArray();
            //dividir los datos segun su tipo de filtracion
            $resultados = $datosFiltrados;

            return view('filtrados.tables-filtrados', [
                'resultados' => $datosFiltrados,
            ]);
        } elseif ($tipo == 'PASIVO') {
            $uuid = $request->input('uuid');
            $escaneo = Escaneos::where('id', $uuid)->first();     
            
            return view('pasivo.resultado', [
                'escaneo' => $escaneo
            ]);
        } elseif ($tipo == 'ACTIVO') {
            $uuid = $request->input('uuid');
            //como llamos a todos los datos de la tabla escaneos y a las que tiene asocialdas all
            $escaneo = Escaneos::where('id', $uuid)->with('resultados')->first();
          
            //dd($escaneo->resultados->toArray());
            return view('activo.resultado', [
                'escaneo' => $escaneo,
                'resultados' => $escaneo->resultados->toArray()
            ]);

        } else {
            // Redirigir a una vista por defecto si no se encuentra ninguno
            return redirect()->route('index')->with('error', 'No se encontraron resultados');
        }
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($uuid)
    {
        $resultados = Resultados_Escaneos::where('escaneo_id', $uuid)->get();
        
        return view('escaneo.resultado', [
            'resultados' => $resultados
        ]);
    }
    
    public function edit(Escaneos $escaneos)
    {
        //
    }

    public function update(Request $request, Escaneos $escaneos)
    {
        //
    }
    public function destroy(Escaneos $escaneos)
    {
        //
    }
}
