<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagenes";

    protected $guarded = [];

    public function avances(){
        return $this->belongsToMany('App\Avance')->withTimestamps();
    }

    public function usuarios(){
        return $this->belongsToMany('App\User');
    }

    public function seguimientos(){
        return $this->belongsToMany('App\Seguimiento','imagenes_seguimiento','imagenes_id', 'seguimiento_id');
    }

}




