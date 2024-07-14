<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//resultado
use App\Models\Resultados_Escaneos;

//escaneos
use App\Models\Escaneos;
class BaseController extends Controller
{
    public function index()
    {
        //$resultados = Resultados_Escaneos::all();
        //dd($resultados);
        //$resultados = $resultados->toArray();
        //dd($resultados);
        //dd($resultados->toArray());    
        //$escaneos = Escaneos::all();
        //por fecchas  mas recientes
        $escaneos = Escaneos::with('resultados')->orderBy('created_at', 'desc')->get()->toArray();
        //dd($escaneos);
        //dd($escaneos);

        //dd($escaneos);
        return view('index',[
            'escaneos' => $escaneos
        ]);

    }

    public function welcome()
    {   
        return view('welcome');
    }

    public function show($id)
    {
        //$escaneos = Escaneos::find($id);
        return view('show',[
            'escaneos' => $escaneos
        ]);
    }

    public function enviar(Request $request)
    {
        // Recibe los datos del escaneo desde la solicitud

        //dd($request->all());
        //convertir en array
        //dd($request->all());

        $jsonResultados = $request->input('resultados');
        $resultados = json_decode($jsonResultados, true);
        //dd($resultados);
        //dd($resultados);
        // Aquí puedes agregar la lógica para enviar los resultados, por ejemplo, por email o API
        return view('pasivo.resultado',[
            'resultados' => $resultados
        ]);
        // return redirect()->route('pasivo.resultado', ['resultados' => $resultados])->with('success', 'Escaneo enviado con éxito');
    }

}
