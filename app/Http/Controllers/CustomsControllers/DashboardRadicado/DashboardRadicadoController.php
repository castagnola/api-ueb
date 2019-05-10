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

    /**
     * Consulta para traer los radicado por Reclamo
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */

    function getListaRadicadoByReclamo()
    {

        $listaRadicado = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'
        ])->where('id_tipo_pqrs', '=', 2)->get();
        return $listaRadicado;
    }

    /**
     * Consulta para traer los radicados por Queja
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    function getListaRadicadoByQueja()
    {

        $listaRadicado = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'
        ])->where('id_tipo_pqrs', '=', 4)->get();
        return $listaRadicado;
    }

    /**
     * Consulta para traer los radicados por Sugerencia
     * @return Radicado[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    function getListaRadicadoBySugerencia()
    {

        $listaRadicado = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'
        ])->where('id_tipo_pqrs', '=', 5)->get();
        return $listaRadicado;
    }

    /**
     * Funcion que edita el estado del radicado por el id
     * @param Request $request
     * @param $id
     * @return mixed
     */

    function editEstadoRadicadoByid(Request $request, $id)
    {
        $radicado = Radicado::find($id);
        $radicado->id_estado_radicado = $request->input('estado_radicado.id');
        $radicado->justificacion =$request->input('justificacion');
        $radicado->save();
        return $radicado;

    }


}