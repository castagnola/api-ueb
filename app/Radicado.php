<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radicado extends Model
{
    /** @var string Table of BD */
    protected $table = 'radicado';
    public $timestamps = false;

    public function usuario()
    {
        return $this->hasOne('App\User', 'identificacion', 'id_usuario');
    }

    public function estadoRadicado()
    {
        return $this->hasOne('App\EstadoRadicado', 'id', 'id_estado_radicado');
    }

    public function tipo()
    {
        return $this->hasOne('App\TipoPqrs', 'id', 'id_tipo_pqrs')->where('activo', 1);

    }
}
