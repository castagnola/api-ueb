<?php

namespace App\Http\Controllers\CustomsControllers\DashboardRadicado;

use App\Http\Controllers\AuthController;
use App\Mail\SendEmail;
use App\Radicado;
use App\RadicadoAud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


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
        $fecha = new \DateTime();
        $radicado = Radicado::find($id);
        $radicado->id_estado_radicado = $request->input('estado_radicado.id');
        $radicado->justificacion = $request->input('justificacion');
        $radicado->save();


        $aud = new RadicadoAud();

        if($request->input('estado_radicado.id') == 2){
            $aud->fecha= $fecha;
            $aud->id_radicado =$request->input('id');
            $aud->razon = 'Edicion al estado En estudio';
            $aud->save();
        }

        if($request->input('estado_radicado.id') == 3){
            $aud->fecha= $fecha;
            $aud->id_radicado =$request->input('id');
            $aud->razon = 'Edicion al estado Resuelto';
            $aud->save();
        }

        if($request->input('estado_radicado.id') == 4){
            $aud->fecha= $fecha;
            $aud->id_radicado =$request->input('id');
            $aud->razon = 'Edicion al estado Sugerencia';
            $aud->save();
        }
        return $radicado;



    }


}