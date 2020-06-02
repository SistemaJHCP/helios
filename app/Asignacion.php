<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = "asignacion";

    protected $guarded = [];

    public function levantamientos(){
        return $this->hasMany('App\Levantamiento');
    }

    public function precios(){
        return $this->hasMany('App\Precio');
    }

    public function operador(){
        return $this->belongsTo('App\Operador');
    }


    public function usuario(){
        return $this->belongsTo('App\User');
    }

}
