<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $asignado =  DB::table('vw_consulta_estadistica')->where('disponibilidad', 'asignado')->where('lider_usuario_id',\Auth::user()->id)->orWhere('coordinador_asignante_id', \Auth::user()->id)->count();
        $porAsig = ($asignado * 100) / $casoTotal;
        $cancelado =  DB::table('vw_consulta_estadistica')->where('disponibilidad', 'cancelado')->count();
        $porCan = ($cancelado * 100) / $casoTotal;

        return response()->json([$casoTotal, $asignado, number_format($porAsig, 2, '.', ''), $cancelado, number_format($porCan, 2, '.', '')]);

    }

}
