<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $table = "precios";

    protected $guarded = [];

    public function asignacion(){
        return $this->belongsTo('App\Asignacion');
    }

}
