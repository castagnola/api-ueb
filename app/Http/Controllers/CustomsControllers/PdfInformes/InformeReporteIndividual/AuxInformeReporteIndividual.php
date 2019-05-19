<?php

namespace App\Http\Controllers\CustomsControllers\PdfInformes\InformeReporteGeneral;

use App\Radicado;
use App\TipoPqrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuxInformeReporteIndividual extends Controller
{
    public $data;

    /**
     * Función para traer la informacion del reporte que recibe un tipo de pqrs
     * @param $idEstado
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getInfoReporteById($idRadicado)
    {
        $data = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'

        ])->where('id', '=', $idRadicado)->get();

        return $data;
    }


}
