<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{

    protected $table = "observacion";

    protected $fillable = ['observacion', 'caso_id'];

}
