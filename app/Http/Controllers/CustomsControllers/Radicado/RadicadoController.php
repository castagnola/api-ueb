<?php

namespace App\Http\Controllers\CustomsControllers\Radicado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TipoPqrs;

class RadicadoController extends Controller
{

    public function getTipoPqrs(){
        return TipoPqrs::where('activo',1)->get();
    }
}
