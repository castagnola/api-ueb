<?php

namespace App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteGeneral;

use App\Radicado;
use App\TipoPqrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuxInformeController extends Controller
{
    public $data;

    /**
     * Funcion para generar el reporte general
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getInfoReporte()
    {

        $data = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'

        ])->get();

        return $data;
    }

    /**
     * Función para traer la informacion del reporte que recibe un tipo de pqrs
     * @param $idEstado
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getInfoReporteByTipo($idTipo)
    {
        $data = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'

        ])->where('id_tipo_pqrs', '=', $idTipo)->get();

        return $data;
    }


}
