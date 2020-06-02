<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = "general";

    protected $fillable = [
        'clave_general'
    ];

}
