<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{

    protected $table = "seguimiento";

    protected $fillable = [
        'avance',
        'fotografo',
        'caso_id'
    ];

    public function imagenes(){
        return $this->belongsToMany('App\Imagen','imagenes_seguimiento','imagenes_id', 'seguimiento_id');
    }


}
