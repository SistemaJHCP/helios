<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $table = "caso";

    protected $fillable = [
        'correctivo',
        'orden',
        'fecha',
        'sintoma',
        'prioridad',
        'siniestro',
        'motivo',
        'descripcion',
        'usuario',
        'telefono',
        'u_tecnica',
        'inmueble',
        'planta',
        'oficina',
        'ceco',
        'coordinador-bbva',
        'coordinador_jhcp_id',
        'operador_id'
    ];

    public function Asignaciones(){
        return $this->hasMany('App\Asignacion');
    }

}
