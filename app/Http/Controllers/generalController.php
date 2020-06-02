<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use Alert;
use App\Permisos;
use App\User;

class generalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function usuarioppal(){
        $usuarioPrincipal = User::select()->join('permisos', 'users.permisos_id', '=', 'permisos.id')->where('users.id', \Auth::user()->id)->where('permisos.estado', 'activo')->first();
        return $usuarioPrincipal;
    }


    public function index()
    {

        $u = $usuarioppal = $this->usuarioppal();
        if ($u->configuracion != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $gen = General::all();
        $general = $gen->last();
        return view('general.index')->with('claveGeneral', $general);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, $id)
    {

        $u = $usuarioppal = $this->usuarioppal();
        if ($u->conf_masterk != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }


        $gen = General::find($id);

        $gen->clave_general = $request->cambio;

        $valida = $gen->save();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha modificado la clave maestra por '.$request->cambio);
            return redirect()->route('general.index');
        } else {
            Alert::error('Hubo un error', 'No se ha realizado la modificación');
            return redirect()->route('general.index');
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
