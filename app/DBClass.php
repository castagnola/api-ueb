<?php
/**
 * Created by PhpStorm.
 * User: soulsystem1
 * Date: 14/5/2019
 * Time: 22:36
 */
namespace App;
use Illuminate\Database\Eloquent\Model;


class DbClass extends Model
{

    function conexion()
    {

        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'tienda';
        $mysqlCo = new \mysqli($host, $username, $password, $dbname);
        if ($mysqlCo->connect_errno) {
            return "Error en la conección a la base de datos" . $mysqlCo->connect_error;
        } else {
            return 'Conección exitosa';
        }

//$mbd = new PDO('mysql:host=localhost;dbname=tienda', $usuario, $contraseña);

    }
    }