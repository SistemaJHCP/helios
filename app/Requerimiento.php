<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    protected $table = "requerimiento";

    protected $guarded = [];

    public function levantamiento(){
        return $this->belongsTo('App\Levantamiento');
    }


}
