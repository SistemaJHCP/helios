<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Operador;
use App\User;
use App\Asignacion;
use App\Levantamiento;
use App\Seguimiento;
use App\Requerimiento;
use App\Precio;
use App\Observacion;
Use Alert;

class operadorController extends Controller
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
        $u  = $this->usuarioppal();
        if ($u->operador != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $operador = Operador::select()->get();

        $coord = DB::table('vw_permiso_coordinador')->where('acceso_coord','1')->get();
        $espera = Operador::where('disponibilidad', 'en espera del cliente')->count();
        $crd = Operador::where('disponibilidad', 'cerrado por coord')->count();
        $cancel = Operador::where('disponibilidad', 'cancelado')->count();

        return view('operador.index')->with('coord',$coord)->with('cancel', $cancel)->with('operador',$operador)->with("espera",$espera)->with('crd',$crd);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $u  = $this->usuarioppal();
        if ($u->ope_create != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $request->validate([
            'correctivo' => 'required|max:11',
            'orden' => 'required|max:50',
            'fecha' => 'required|max:16',
            'fecha_fin' => 'required|max:16',
            'sintoma' => 'required|max:50',
            'prioridad' => 'required',
            'siniestro' => 'required',
            'motivo' => 'required|max:50',
            'descripcion' => 'required|max:240',
            'usuario' => 'required|max:20',
            'telefono' => 'required|max:12',
            'u_tecnica' => 'required|max:100',
            'inmueble' => 'required|max:50',
            'planta' => 'required|max:50',
            'oficina' => 'required|max:18',
            'ceco' => 'required|max:50',
            'coordinador_bbva' => 'required|max:50',
            'emplazamiento' => 'required|max:90',
            'coordinador_jhcp' => 'required'
        ]);

        $ope = new Operador;

        $ope->correctivo = $request->correctivo;
        $ope->orden = $request->orden;
        $ope->sintoma = $request->sintoma;
        $ope->prioridad = $request->prioridad;
        $ope->fecha = $request->fecha;
        $ope->fecha_fin = $request->fecha_fin;
        $ope->siniestro = $request->siniestro;
        $ope->motivo = $request->motivo;
        $ope->descripcion = $request->descripcion;
        $ope->usuario = $request->usuario;
        $ope->telefono = $request->telefono;
        $ope->u_tecnica = $request->u_tecnica;
        $ope->inmueble = $request->inmueble;
        $ope->planta = $request->planta;
        $ope->oficina = $request->oficina;
        $ope->ceco = $request->ceco;
        $ope->emplazamiento = $request->emplazamiento;
        $ope->coordinador_bbva = $request->coordinador_bbva;
        $ope->coordinador_jhcp_id = $request->coordinador_jhcp;
        $ope->operador_creador_id = \Auth::User()->id;

        $valida = $ope->save();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado la política');
            return redirect()->route('operador.index');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('operador.index');
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
        $u  = $this->usuarioppal();
        if ($u->ope_read != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $operador = DB::table('vw_procedimiento_general')->where('id_operador', $id)->first();
        $coord_jhcp = User::where('id', $operador->coordinador_jhcp_id)->first();
        $ope_creador = User::where('id', $operador->operador_creador_id)->first();
        $lider_cuadrilla = User::where('id', $operador->lider_usuario_id)->first();
        $seguimiento = Seguimiento::where('caso_id', $id)->first();

        return view('operador.ver')->with('id', $id)->with('operador', $operador)->with('seguimiento', $seguimiento)->with('coord_jhcp', $coord_jhcp)->with('ope_creador', $ope_creador)->with('lider_cuadrilla', $lider_cuadrilla);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u  = $this->usuarioppal();
        if ($u->ope_update != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);

        $coord = DB::table('vw_permiso_coordinador')->where('acceso_coord','1')->get();
        return view('operador.modificar')->with('folio', $folio)->with('coord',$coord);
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
        $u  = $this->usuarioppal();
        if ($u->ope_update != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $request->validate([
            'orden' => 'required|max:50',
            'fecha' => 'required|max:22',
            'fecha_fin' => 'required|max:22',
            'sintoma' => 'required|max:50',
            'prioridad' => 'required',
            'siniestro' => 'required',
            'motivo' => 'required|max:50',
            'descripcion' => 'required|max:240',
            'usuario' => 'required|max:20',
            'telefono' => 'required|max:12',
            'u_tecnica' => 'required|max:100',
            'inmueble' => 'required|max:50',
            'planta' => 'required|max:50',
            'oficina' => 'required|max:18',
            'ceco' => 'required|max:50',
            'coordinador_bbva' => 'required|max:50',
            'emplazamiento' => 'required|max:90',
            'coordinador_jhcp' => 'required'
        ]);


        $mod = Operador::find($id);

        $mod->orden = $request->orden;
        $mod->sintoma = $request->sintoma;
        $mod->prioridad = $request->prioridad;
        $mod->fecha = $request->fecha;
        $mod->siniestro = $request->siniestro;
        $mod->motivo = $request->motivo;
        $mod->descripcion = $request->descripcion;
        $mod->usuario = $request->usuario;
        $mod->telefono = $request->telefono;
        $mod->u_tecnica = $request->u_tecnica;
        $mod->inmueble = $request->inmueble;
        $mod->planta = $request->planta;
        $mod->oficina = $request->oficina;
        $mod->ceco = $request->ceco;
        $mod->emplazamiento = $request->emplazamiento;
        $mod->coordinador_bbva = $request->coordinador_bbva;
        $mod->coordinador_jhcp_id = $request->coordinador_jhcp;

        $valida = $mod->update();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado la política');
            return redirect()->route('operador.index');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('operador.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $u  = $this->usuarioppal();
        if ($u->ope_delete != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }


        $ope = Operador::find($id);
        $valida = $ope->delete();

        return  response()->json($valida);

    }

    public function foliosEnEspera(){

        $u  = $this->usuarioppal();
        if ($u->ope_permiso != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }
        return view('operador.indexEsperaFolio');
    }

    public function analisisValores($id){

        $u  = $this->usuarioppal();
        if ($u->ope_permiso != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }


        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id);
        $asig = Asignacion::where('caso_id',$folio->id)->first();
        $lider = User::where('id', $asig->lider_usuario_id)->first();
        $lev = Levantamiento::where('asignacion_id', $asig->id)->first();
        $materiales = Requerimiento::where('levantamiento_id', $lev->id)->get();
        $precio = Precio::where('asignacion_id', $asig->id)->first();

        return view('operador.analisisAprobacion')->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('lider', $lider)->with('levantamiento', $lev)->with('materiales', $materiales)->with('precio',$precio);
    }

    public function analisisCierre($id){

        $u  = $this->usuarioppal();
        if ($u->ope_cerrar != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id);
        $asig = Asignacion::where('caso_id',$folio->id)->first();
        $lider = User::where('id', $asig->lider_usuario_id)->first();
        $lev = Levantamiento::where('asignacion_id', $asig->id)->first();
        $materiales = Requerimiento::where('levantamiento_id', $lev->id)->get();
        $precio = Precio::where('asignacion_id', $asig->id)->first();

        return view('operador.analisisCierre')->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('lider', $lider)->with('levantamiento', $lev)->with('materiales', $materiales)->with('precio',$precio)->with('id', $id);
    }

    public function eliminarEjecucion(Request $request, $id){

        $u  = $this->usuarioppal();
        if ($u->ope_permiso != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $validatedData = $request->validate([
            'observacionReprobado' => 'required'
        ]);


        $operacion = Operador::find($id);
        $operacion->disponibilidad = "cancelado";
        $valida = $operacion->update();

        if ($valida) {

            $observacion = new Observacion;
            $observacion->observacion = $request->observacionReprobado;
            $observacion->caso_id = $id;
            $observacion->status = "cancelado";
            $w = $observacion->save();

            if ($w) {
                Alert::success('solicitud procesada', 'Se a aprobado el servicio pr parte de JHCP, C.A.');
                return redirect()->route('operador.index');
            } else {
                Alert::error('Hubo un error', 'No cargó la observación');
                return redirect()->route('operador.index');
            }
        } else {
            Alert::error('Hubo un error', 'No se ejecuto la cancelación ddel fólio');
            return redirect()->route('operador.index');
        }

    }

    public function aprobarEjecucion(Request $request, $id){

        $u  = $this->usuarioppal();
        if ($u->ope_permiso != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $validatedData = $request->validate([
            'observacionAprobado' => 'required'
        ]);

        $operacion = Operador::find($id);
        $operacion->disponibilidad = "ejecutando";
        $valida = $operacion->update();

        if ($valida) {

            $observacion = new Observacion;
            $observacion->observacion = $request->observacionAprobado;
            $observacion->caso_id = $id;
            $observacion->status = "aprobado";
            $w = $observacion->save();

            if ($w) {
                Alert::success('solicitud procesada', 'Se a aprobado el servicio pr parte de JHCP, C.A.');
                return redirect()->route('operador.index');
            } else {
                Alert::error('Hubo un error', 'No cargó la observación');
                return redirect()->route('operador.index');
            }
        } else {
            Alert::error('Hubo un error', 'No se ejecuto la cancelación ddel fólio');
            return redirect()->route('operador.index');
        }

    }

    // public function galeriaOperador($id){
    //     dd("Galeria de imagenes");
    // }

//----------------------------- impresion PDF ----------------------------------

    public function consultaPdf($id){

        $rand = rand(100,999);
        $operador = DB::table('vw_procedimiento_general')->where('id_operador', $id)->get();
        $ope = User::select('name', 'lastname')->where('id',$operador[0]->operador_creador_id)->first();
        $coord = User::select('name', 'lastname')->where('id',$operador[0]->coordinador_jhcp_id)->first();
        $lider = User::select('name', 'lastname')->where('id',$operador[0]->lider_usuario_id )->first();
        $asignacion = Asignacion::where('caso_id', $operador[0]->id_operador)->first();
        $levan = Levantamiento::where('asignacion_id', $asignacion->id)->first();
        $reque = Requerimiento::where('levantamiento_id', $levan->id)->get();
        $precio = Precio::where('asignacion_id', $asignacion->id)->first();
        $observacion = Observacion::where('caso_id',  $operador[0]->id_operador)->first();


        $pdf = PDF::loadView('pdf.consulta', compact('operador','ope','coord','lider','levan', 'precio', 'reque','observacion'));
        return $pdf->download('neg-'.$operador[0]->correctivo.'-'.$rand.'.pdf');
    }

    public function informeNegativa($id){
        $rand = rand(100,999);
        $operador = DB::table('vw_procedimiento_general')->where('id_operador', $id)->get();
        $ope = User::select('name', 'lastname')->where('id',$operador[0]->operador_creador_id)->first();
        $coord = User::select('name', 'lastname')->where('id',$operador[0]->coordinador_jhcp_id)->first();
        $lider = User::select('name', 'lastname')->where('id',$operador[0]->lider_usuario_id )->first();
        $asignacion = Asignacion::where('caso_id', $operador[0]->id_operador)->first();
        $levan = Levantamiento::where('asignacion_id', $asignacion->id)->first();
        $reque = Requerimiento::where('levantamiento_id', $levan->id)->get();
        $precio = Precio::where('asignacion_id', $asignacion->id)->first();
        $observacion = Observacion::where('caso_id',  $operador[0]->id_operador)->first();


        $pdf = PDF::loadView('pdf.negativa', compact('operador','ope','coord','lider','levan', 'precio', 'reque','observacion'));
        return $pdf->download('neg-'.$operador[0]->correctivo.'-'.$rand.'.pdf');
    }

    public function informeCulminada($id){
        $rand = rand(100,999);
        $operador = DB::table('vw_procedimiento_general')->where('id_operador', $id)->get();
        $ope = User::select('name', 'lastname')->where('id',$operador[0]->operador_creador_id)->first();
        $coord = User::select('name', 'lastname')->where('id',$operador[0]->coordinador_jhcp_id)->first();
        $lider = User::select('name', 'lastname')->where('id',$operador[0]->lider_usuario_id )->first();
        $asignacion = Asignacion::where('caso_id', $operador[0]->id_operador)->first();
        $levan = Levantamiento::where('asignacion_id', $asignacion->id)->first();
        $reque = Requerimiento::where('levantamiento_id', $levan->id)->get();
        $precio = Precio::where('asignacion_id', $asignacion->id)->first();
        $observacion = Observacion::where('caso_id',  $operador[0]->id_operador)->first();

//------------- Carga de imagenes en el pdf culminado -------------

    $intento = Seguimiento::select('id','avance', 'created_at')->where('caso_id', $id)->orderBy('id', 'DESC')->get();

    $arreglo = array();

    foreach($intento as $s){

        $avance[] = $s->avance;
        $avance[] = $s->created_at;

        $imagen = DB::table('vw_lista_imagenes')->where('seguimiento_id', $s->id)->orderBy('id', 'ASC')->limit(6)->get();

            if(count($imagen) < 1){
                $ruta[] = "imagenes/correctivos/sin-imagenes.jpg";
            } else {
                for ($i=0; $i < count($imagen); $i++) {
                    $ruta[$i] = $imagen[$i]->ruta_imagen;
                }
            }
        shuffle($ruta);
        array_push($arreglo, [$avance, $ruta]);
        unset($avance, $ruta);
    }

//--------------------------

        $pdf = PDF::loadView('pdf.culminado', compact('operador','ope','coord','lider','levan', 'precio', 'reque','observacion','arreglo'));
        return $pdf->download('apro-'.$operador[0]->correctivo.'-'.$rand.'.pdf');
    }

    public function foliosCierreCoord()
    {
        $u  = $this->usuarioppal();
        if ($u->ope_cerrar != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }
        return view('operador.aproCoord');
    }

//  ------------------------------- jquery -------------------------------------

    public function jq_lista(){

        $u  = $this->usuarioppal();
        if ($u->operador != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        return datatables()
        ->eloquent(Operador::query()->where('operador_creador_id', \Auth::user()->id))
        ->addColumn('btn','operador.botonIndex')
        ->rawColumns(['btn'])
        ->toJson();

    }


    public function jq_finalizar($id){
        $caso = Operador::find($id);
        $caso->disponibilidad = "culminado";

        $valida = $caso->save();
        return response()->json($valida);
    }


    public function jq_enEspera(){

        return datatables()
        ->eloquent(Operador::query()->where('disponibilidad','en espera del cliente'))
        ->addColumn('btn',
        '<a href="{{ route("operador.analisisValores",$id) }}"><button title="Ver el fólio" id="ver" class="btn btn-primary fa fa-sticky-note"></button></a>'
        )
        ->rawColumns(['btn'])
        ->toJson();

    }

    public function jq_casiCulmi() {
        return datatables()
        ->eloquent(Operador::query()->where('disponibilidad','cerrado por coord')->orWhere('disponibilidad','culminado'))
        ->addColumn('btn',
        '<a href="{{ route("operador.analisisCierre",$id) }}"><button title="Ver el fólio" id="ver" class="btn btn-primary fa fa-sticky-note"></button></a>'
        )
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function jq_listaMateriales($id) {

    }


}
