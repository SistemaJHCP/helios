<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // protected $appends = ['nombre_completo'];

    protected $fillable = [
        'name','lastname', 'email', 'password','permisos_id','nombre_imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getNombreCompletoAttribute()
    // {
    //     return $this->name . ' ' . $this->lastname;
    // }
    public function asignaciones(){
        return $this->hasMany('App\Asignacion');
    }

    public function permiso(){
        return $this->belongsTo('App\Permiso');
    }

    public function imagenes(){
        return $this->belongsToMany('App\Imagen');
    }

}
