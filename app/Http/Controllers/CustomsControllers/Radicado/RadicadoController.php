<?php

namespace App\Http\Controllers\CustomsControllers\Radicado;

use App\Radicado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TipoPqrs;

class RadicadoController extends Controller
{
    /**
     * @return mixed tipos radicados activos
     */

    public function getTipoPqrs(){
        return TipoPqrs::where('activo',1)->get();
    }

    public function createRadicado(){
    }
}
