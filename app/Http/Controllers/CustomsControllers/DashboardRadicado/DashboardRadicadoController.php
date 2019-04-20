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
    function __construct()
    {

    }

    function getListaRadicado(Request $request)
    {


        $listaRadicado = Radicado::with([
            'usuario',
            'estadoRadicado',
            'tipo'
        ])->where('id_usuario', '=', 33)->get();
        return $listaRadicado;


    }

}