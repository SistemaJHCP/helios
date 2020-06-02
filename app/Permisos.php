<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table = "permisos";

    public $timestamps = false;

    protected $fillable = [
        'nombre_permisos',
        'operador',
        'ope_create',
        'ope_read',
        'ope_update',
        'ope_delete',
        'ope_print',
        'ope_close',
        'coordinador',
        'coord_selection',
        'coord_consult',
        'coord_update',
        'coord_send',
        'coord_print',
        'cuadrilla',
        'cua_print',
        'cua_create',
        'cua_read',
        'cua_update',
        'cua_delete',
        'cua_finish',

        'configuracion ',
        'conf_create ',
        'conf_modify ',
        'conf_rehability',
        'conf_deshability',
        'conf_access_pre',
        'conf_charge_pre',
        'conf_modify_pre',
        'conf_del_pre',
        'conf_hab_pol',
        'conf_con_pol',
        'conf_mod_pol'
    ];

    public function usuarios(){
        return $this->hasMany('App\User');
    }
}
