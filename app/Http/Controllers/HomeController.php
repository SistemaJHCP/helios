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

        // Todos los casos que tiene el sistema
        $casoTotal = Operador::select()->count();
        // Los casos asignados al usuario activo
        $asignado =  DB::table('vw_consulta_estadistica')->where('disponibilidad', 'asignado')->where('lider_usuario_id',\Auth::user()->id)->orWhere('coordinador_asignante_id', \Auth::user()->id)->count();
        // Calcular el porcentaje de os casos asignados
        $porAsig = ($asignado * 100) / $casoTotal;
        // Total de casos cancelados en el sistema
        $cancelado =  DB::table('vw_consulta_estadistica')->where('disponibilidad', 'cancelado')->count();
        // Porcentaje de casos cancelados en el sistema
        $porCan = ($cancelado * 100) / $casoTotal;
        // Casos ejecutandose en estos momentos
        $ejecutando =  DB::table('vw_consulta_estadistica')->where('disponibilidad', 'ejecutando')->count();
        // Porcentaje de casos en ejecucion
        $porEjec = ($ejecutando * 100) / $casoTotal;
        // Casos en espera de aprobacion
        $esperando =  DB::table('vw_consulta_estadistica')->where('disponibilidad', 'esperando aprobación')->count();
        // Porcentaje de casos cancelados en el sistema
        $porApro = ($cancelado * 100) / $casoTotal;

        return response()->json([$casoTotal, $asignado, number_format($porAsig, 2, '.', ''), $cancelado, number_format($porCan, 2, '.', ''), $ejecutando, number_format($porEjec, 2, '.', ''), $esperando, number_format($porApro, 2, '.', '')]);

    }

}
