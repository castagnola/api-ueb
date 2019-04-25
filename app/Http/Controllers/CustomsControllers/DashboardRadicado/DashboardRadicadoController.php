<?php

namespace App\Http\Controllers\CustomsControllers\DashboardRadicado;

use App\Http\Controllers\AuthController;
use App\Mail\SendEmail;
use App\Radicado;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TipoPqrs;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\SignUpRequest;


class DashboardRadicadoController extends Controller
{

    /**
     * Consulta para traer los radicados por Peticion
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    function getListaRadicado()
    {


        $listaRadicado = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'
        ])->where('id_tipo_pqrs', '=', 1)->get();
        return $listaRadicado;


    }

    function getListaRadicadoByReclamo(){

        $listaRadicado = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'
        ])->where('id_tipo_pqrs', '=', 2)->get();
        return $listaRadicado;
    }

}