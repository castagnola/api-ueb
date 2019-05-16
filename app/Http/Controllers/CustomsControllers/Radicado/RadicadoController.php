<?php

namespace App\Http\Controllers\CustomsControllers\Radicado;

use App\Mail\SendEmail;
use App\Radicado;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TipoPqrs;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class RadicadoController extends Controller
{
    public $contrasena;

    /**
     * @return mixed tipos radicados activos
     */

    public function getTipoPqrs()
    {
        return TipoPqrs::where('activo', 1)->get();
    }

    public function createRadicado(Request $request)
    {
        if ($this->validateUser($request->identificacion)) {

            $this->saveRadicado($request);
            return $this->failedResponse();

        }

        $this->sendEmail($request->correo);
        $this->saveUserRadicado($request);
        return $this->succesResponse();
    }

    /**
     * @param $id la identificación del usuario a validar
     * @return bool
     */
    public function validateUser($id)
    {

        /**
         * !! identifica si es true o false
         */
        return !!User::where('identificacion', $id)->first();
    }

    /**
     * @return \Illuminate\Http\JsonResponse  response send
     */
    public function failedResponse()
    {
        return response()->json(['data' => ' # Solicitud creada exitosamente'], Response::HTTP_OK);
    }

    /**
     * @return \Illuminate\Http\JsonResponse response send
     */

    public function succesResponse()
    {
        return response()->json(['data' => 'Datos enviados, please check your  email'], Response::HTTP_OK);
    }

    /**
     * @param $email data  the element to  send
     */
    public function sendEmail($email)
    {
        $password = str_random(6);
        $this->savePassword($password);
        Mail::to($email)->send(new SendEmail($password));

    }

    public function savePassword($password)
    {

        return $this->contrasena = $password;

    }

    public static function generatePassword($password)
    {
        /**
         * Encryp the string
         */

        return bcrypt($password);
    }

    /**
     * Method to save Radicado
     * @param $data
     *  @return
     */
    public function saveRadicado($data)
    {
        $radicado = new Radicado();
        $id = User::select('id')->where('identificacion', $data->identificacion)->first();
        $radicado->email = $data->correo;
        $radicado->telefono = $data->telefono;
        $radicado->numero_radicado = random_int(2,10);
        $radicado->id_tipo_pqrs = $data->id_tipo_pqrs;
        $radicado->comentarios = $data->comentarios;
        $radicado->id_usuario = $id->id;
        $estado = $data->id_tipo_pqrs != 5 ? $estado=1 : $estado = 4;
        $radicado->id_estado_radicado = $estado;
        $radicado->save();

        return $radicado;

    }

    /**
     * Method to save user no exist on the Db
     * @param $data
     * @return
     */
    public function saveUserRadicado($data)
    {
        /** @var  $user crate Usuario */

        $user = new User();
        $password = bcrypt(str_random(6));
        $user->nombre = $data->nombre;
        $user->identificacion = $data->identificacion;
        $user->email = $data->correo;
        $user->telefono = $data->telefono;
        $user->password = $this->contrasena;
        $user->id_perfil = 2;
        $user->save();

        $this->saveRadicado($data);
        return $user;
    }


}
