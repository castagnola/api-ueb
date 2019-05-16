<?php

namespace App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteGeneral;

use App\Radicado;
use App\TipoPqrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuxInformeController extends Controller
{
    public $data;

    public function getInfoReporte()
    {

        $data = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'

        ])->get();

        return $data;
    }

}
