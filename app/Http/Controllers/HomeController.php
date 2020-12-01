<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operador;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usuarioppal(){
        $usuarioPrincipal = User::select()->join('permisos', 'users.permisos_id', '=', 'permisos.id')->where('users.id', \Auth::user()->id)->where('permisos.estado', 'activo')->first();
        return $usuarioPrincipal;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inicio.inicio');
    }

    public function inicio()
    {
        return view('inicio.inicio');
    }


//------------------jquery------------------------

    public function iniciarProcedimiento(){

        $casoTotal = Operador::select()->count();
        $casosAsignados = Operador::where('coordinador_jhcp_id',\Auth::user()->id)->count();
        dd($casosAsignados);

    }

}
