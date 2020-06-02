<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levantamiento extends Model
{
    protected $table = "levantamiento";

    protected $fillable = [
        'asignacion_id',
        'descripcion'
    ];

    public function asignacion(){
        return $this->belongsTo('App\Asignacion');
    }

    public function requerimientos(){
        return $this->hasMany('App\Requerimiento');
    }

}
