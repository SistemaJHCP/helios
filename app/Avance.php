<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    protected $table = "avances";

    protected $guarded = [];

    public function imagen(){
        return $this->belongsToMany('App\Imagen')->withTimestamps();
    }

}
