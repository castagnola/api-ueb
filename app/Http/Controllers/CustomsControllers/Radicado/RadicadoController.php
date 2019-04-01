<?php

namespace App\Http\Controllers\CustomsControllers\Radicado;

use App\Mail\SendEmail;
use App\Radicado;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use App\TipoPqrs;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class RadicadoController extends Controller
{
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

//        $this->sendEmail($request->correo);
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
     * @param $email data as send
     */
    public function sendEmail($email)
    {
        $password = str_random(10);
        $passwordCryp = $this->generatePassword($password);
        $newUser = new User();
        Mail::to($email)->send(new SendEmail);

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
     */
    public function saveRadicado($data)
    {
        $radicado = new Radicado();
        $id = User::select('id')->where('identificacion', $data->identificacion)->first();
        $radicado->email = $data->correo;
        $radicado->telefono = $data->telefono;
        $radicado->numero_radicado = str_random(2);
        $radicado->id_tipo_pqrs = $data->id_tipo_pqrs;
        $radicado->comentarios = $data->comentarios;
        $radicado->id_usuario = $id->id;
        $radicado->save();

    }

    /**
     * Method to save user no exist on the Db
     * @param $data
     */
    public function saveUserRadicado($data)
    {
        /** @var  $user crate Usuario */

        $user = new User();
        $password = bcrypt(str_random(60));
        $user->nombre = $data->nombre;
        $user->identificacion = $data->identificacion;
        $user->email = $data->correo;
        $user->telefono = $data->telefono;
        $user->password = $password;
        $user->save();

        $this->saveRadicado($data);
    }


}
