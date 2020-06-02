<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permisos;
Use Alert;

class politicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Permisos::select('id', 'nombre_permisos')->where('estado', 'activo')->get();
        return view('permisos.index')->with('permisos', $p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $p = new Permisos;
        $p->nombre_permisos = $request->nombre_politica;
        $p->operador = $request->operador;
        $p->ope_create = $request->ope_cargar;
        $p->ope_read = $request->ope_consultar;
        $p->ope_update = $request->ope_modificar;
        $p->ope_delete = $request->ope_eliminar;
        $p->ope_print = $request->ope_imprimir;
        $p->ope_cerrar = $request->ope_cerrar;
        $p->ope_permiso = $request->ope_permiso;


        $p->coordinador = $request->coordinador;
        $p->coord_listado = $request->coord_recibir_folios; //coord_asignacion
        $p->coord_selection = $request->coord_seleccionar;
        $p->coord_consult = $request->coord_consultar;
        $p->coord_update = $request->coord_modificar;
        $p->coord_send = $request->coord_enviar;
        $p->coord_print = $request->coord_imprimir;

        $p->cuadrilla = $request->cuadrilla;
        $p->cua_print = $request->cua_imprimir;
        $p->cua_create = $request->cua_cargar;
        $p->cua_read = $request->cua_consultar;
        $p->cua_update = $request->cua_modificar;
        $p->cua_delete = $request->cua_eliminar;
        $p->cua_finish = $request->cua_fin;

        $p->configuracion = $request->configuracion;
        $p->conf_create = $request->conf_crear;
        $p->conf_modify = $request->conf_modificar;
        $p->conf_rehability = $request->conf_rehabilitar;
        $p->conf_deshability = $request->conf_deshabilitar;
        $p->conf_access_pre = $request->conf_acceso_pre;
        $p->conf_charge_pre = $request->conf_cargar_pre;
        $p->conf_modify_pre = $request->conf_mod_pre;
        $p->conf_del_pre = $request->conf_elim_pre;
        $p->conf_hab_pol = $request->conf_hab_pol;
        $p->conf_con_pol = $request->conf_cons_pol;
        $p->conf_mod_pol = $request->conf_mod_pol;
        $p->conf_masterk = $request->conf_master;

        $valida = $p->save();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado la política');
            return redirect()->route('politicas.inicio');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('politicas.inicio');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permisos = Permisos::find($id);
        return view('permisos.ver')->with('permisos', $permisos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permisos = Permisos::find($id);
        return view('permisos.modificar')->with('permisos', $permisos);
    }


    public function update(Request $request, $id)
    {
        $p = Permisos::find($id);

        $p->nombre_permisos = $request->nombre_politica;
        $p->operador = $request->operador;
        $p->ope_create = $request->ope_cargar;
        $p->ope_read = $request->ope_consultar;
        $p->ope_update = $request->ope_modificar;
        $p->ope_delete = $request->ope_eliminar;
        $p->ope_print = $request->ope_imprimir;
        $p->ope_close = $request->ope_cerrar;

        $p->coordinador = $request->coordinador;
        $p->coord_asignacion = $request->coord_recibir_folios;
        $p->coord_selection = $request->coord_seleccionar;
        $p->coord_consult = $request->coord_consultar;
        $p->coord_update = $request->coord_modificar;
        $p->coord_send = $request->coord_enviar;
        $p->coord_print = $request->coord_imprimir;

        $p->cuadrilla = $request->cuadrilla;
        $p->cua_print = $request->cua_imprimir;
        $p->cua_create = $request->cua_cargar;
        $p->cua_read = $request->cua_consultar;
        $p->cua_update = $request->cua_modificar;
        $p->cua_delete = $request->cua_eliminar;
        $p->cua_finish = $request->cua_fin;

        $p->configuracion = $request->configuracion;
        $p->conf_create = $request->conf_crear;
        $p->conf_modify = $request->conf_modificar;
        $p->conf_rehability = $request->conf_rehabilitar;
        $p->conf_deshability = $request->conf_deshabilitar;
        $p->conf_access_pre = $request->conf_acceso_pre;
        $p->conf_charge_pre = $request->conf_cargar_pre;
        $p->conf_modify_pre = $request->conf_mod_pre;
        $p->conf_del_pre = $request->conf_elim_pre;
        $p->conf_hab_pol = $request->conf_hab_pol;
        $p->conf_con_pol = $request->conf_cons_pol;
        $p->conf_mod_pol = $request->conf_mod_pol;
        $p->conf_masterk = $request->conf_master;

        $valida = $p->update();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado la política');
            return redirect()->route('politicas.inicio');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('politicas.inicio');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deshabilitar($id)
    {
        $p = Permisos::find($id);
        $p->estado = 'inactivo';

        $valida = $p->update();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado la política');
            return redirect()->route('politicas.inicio');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('politicas.inicio');
        }

    }

    //---------------- jquery politicas ----------------------

    public function jq_cargar_permisos($nombre)
    {
        $resultado = Permisos::select('id', 'nombre_permisos')->where('nombre_permisos',$nombre)->get();
        return  response()->json($resultado);

    }

}
