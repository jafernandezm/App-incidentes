<?php

namespace App\Http\Controllers;

use App\Models\datos_filtrados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
// modelos escaneos, datosfiltracion
use App\Models\Escaneos;



use Exception;

class DatosFiltradosController extends Controller
{
    public function index()
    {
        $variables = datos_filtrados::all();
        //dd($variables);
        #return redirect()->route('filtrados.index');
        return view('filtrados.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            // Validar y sanitizar la entrada del usuario
            $validated = $request->validate([
                'consulta' => 'required|string|max:255'
            ]);

            $consulta = $validated['consulta'];

            // Construir el array de datos a enviar
            $data = [
                "token" => "1297282705:0Wk6NYLV",
                "request" => $consulta, // Asegurar que la consulta esté entre comillas si es necesario
                "limit" => 100,
                "lang" => "es"
            ];

            // URL a la que se enviará la solicitud POST
            $url = 'https://server.leakosint.com/';

            // Enviar la solicitud POST usando HTTP Client de Laravel
            $response = Http::post(
                $url,
                $data, // Aquí se especifica que los datos deben enviarse como JSON
            );

            // Verificar el código de respuesta HTTP
            $response->throw(); // Lanza una excepción si hay un error HTTP

            // Obtener los datos de la respuesta en formato JSON
            $responseData = $response->json();
            //dd($responseData);
            if (isset($responseData['Status']) && $responseData['Status'] == 'Error') {
                return redirect()->route('filtrados.index')->with('error', 'Hubo un problema al procesar la solicitud o llegó al límite de consultas');
            }
            // Inicializa el contador
            $contador = 0;
            // Verifica si no tiene el mensaje "No se encontraron resultados"
            if (
                !isset($responseData['List']['No results found']['InfoLeak']) ||
                strpos($responseData['List']['No results found']['InfoLeak'], 'No se encontraron resultados') === false
            ) {
                $contador = $responseData['NumOfResults'];
            }

            //dd($contador);
            $escaneo = new Escaneos();
            $escaneo->url = $consulta;
            $escaneo->tipo = 'filtraciones';
            $escaneo->fecha = date('Y-m-d H:i:s');
            $escaneo->resultado = $contador;

            $escaneo->save();
            // Guardar los datos filtrados en la tabla datos_filtrados
            $listData = $responseData['List'];

            foreach ($listData as $api => $data) {
                //dd($data);
                // Verifica si 'InfoLeak' existe en el nivel de la API
                $infoLeak = isset($data['InfoLeak']) ? $data['InfoLeak'] : null;
                //dd($infoLeak);
                foreach ($data['Data'] as $item) {
                    $datos_filtrados = new datos_filtrados();
                    $datos_filtrados->escaneo_id = $escaneo->id;
                    $datos_filtrados->consulta = $consulta;
                    $datos_filtrados->tipo = 'filtraciones';
                    $datos_filtrados->filtracion = $api;
                    $datos_filtrados->informacion = $infoLeak;  // Asigna 'InfoLeak' a cada entrada
                    $datos_filtrados->data = json_encode($item);  // Convertir los datos a JSON
                    $datos_filtrados->save();
                }
            }
        } catch (Exception $e) {
            // Capturar excepciones generales
            // Puedes manejar el error aquí, por ejemplo:
            // Log::error('Error al enviar la solicitud: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un problema al procesar la solicitud.'], 500);
        }
        return redirect()->route('filtrados.index');
    }


    public function show(datos_filtrados $datos_filtrados)
    {
        //
    }

    public function edit(datos_filtrados $datos_filtrados)
    {
        //
    }

    public function update(Request $request, datos_filtrados $datos_filtrados)
    {
        //
    }

    public function destroy(datos_filtrados $datos_filtrados)
    {
        //
    }
}
