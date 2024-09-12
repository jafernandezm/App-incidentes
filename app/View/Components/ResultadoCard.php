<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ResultadoCard extends Component
{
    public $resultado;
    public function __construct($resultado)
    {
        $this->resultado = $resultado;
    }
    public function render()
    {
        return view('componentes.escaneos.resultado-card');
    }
}
