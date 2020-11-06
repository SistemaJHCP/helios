<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Operador;
use App\User;
use App\Asignacion;
use App\Levantamiento;
use App\Precio;
use App\Imagen;
use Mail;
use Alert;

class asignacionController extends Controller
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
        if ($u->coordinador != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        if($u->operador == 1){
            $asig =  DB::table('vw_asignacion_index')->get();
            $total = Operador::select()->count();
            $mios = Operador::select()->where('disponibilidad', 'evaluando')->orWhere('disponibilidad', 'esperando aprobación')->orWhere('disponibilidad', 'en espera del cliente')->count();
            $ejecucion = Operador::select()->where('disponibilidad', 'ejecutando')->count();
            $cancelado = Operador::select()->where('disponibilidad', 'cancelado')->count();
            $culminadoLider = Operador::select()->where('disponibilidad', 'cerrado por lider')->orWhere('disponibilidad', 'cerrado por coord')->count();
        } else {
            $asig =  DB::table('vw_asignacion_index')->where('coordinador_jhcp_id', \Auth::user()->id)->get();
            $total = Operador::select()->where('coordinador_jhcp_id', \Auth::user()->id)->count();
            $mios = Operador::select()->where('coordinador_jhcp_id', \Auth::user()->id)->where('disponibilidad', 'evaluando')->orWhere('disponibilidad', 'esperando aprobación')->orWhere('disponibilidad', 'en espera del cliente')->count();
            $ejecucion = Operador::select()->where('coordinador_jhcp_id', \Auth::user()->id)->where('disponibilidad', 'ejecutando')->count();
            $cancelado = Operador::select()->where('coordinador_jhcp_id', \Auth::user()->id)->where('disponibilidad', 'cancelado')->count();
            $culminadoLider = Operador::select()->where('coordinador_jhcp_id', \Auth::user()->id)->where('disponibilidad', 'cerrado por lider')->orWhere('disponibilidad', 'cerrado por coord')->count();
        }

        return view('asignacion.index')->with('asig', $asig)->with('total',$total)->with('en_espera', $mios)->with('enEjecucion', $ejecucion)->with('cancelado', $cancelado)->with('culLid', $culminadoLider);
    }


    public function mostrar(){

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }
        return view('asignacion.asignar');
    }

    public function mostrarCoord(){

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }


        return view('asignacion.asignarCoord');
    }


    public function procesando(Request $request, $id)
    {
        $asignar = new Asignacion();
        $asignar->caso_id = $id;
        $asignar->lider_usuario_id = $request->lider_cuadrilla;
        $asignar->coordinador_asignante_id = \Auth::user()->id;

        $pro = $asignar->save();

        if ($pro) {
            $modificar = Operador::find($id);
            $modificar->disponibilidad = "asignado";
            $valida = $modificar->update();
        } else {
            Alert::error('Hubo un error', 'No se ha guardado la información');
            return redirect()->route('asignacion.index');
        }

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha asignado el folio a la persona indicada');
            return redirect()->route('asignacion.index');
        } else {
            Alert::error('Hubo un error', 'No se ha procesar la solicitud');
            return redirect()->route('asignacion.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id );
        $lider = DB::table("vw_permiso_lider")->get();

        return view('asignacion.consultar')->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('lider', $lider);
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
        if ($u->coord_consult != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id );
        $lider = DB::table("vw_permiso_lider")->get();
        $asignacion = Asignacion::where('caso_id',$id)->first();

        return view('asignacion.cambiar')->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('lider', $lider)->with('asignacion',$asignacion);

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
        $asignar = Asignacion::select()->where('caso_id', $id)->first();
        $asignar->lider_usuario_id = $request->lider_cuadrilla;

        $valida = $asignar->update();
        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha asignado el folio a la persona indicada');
            return redirect()->route('asignacion.index');
        } else {
            Alert::error('Hubo un error', 'No se ha procesar la solicitud');
            return redirect()->route('asignacion.index');
        }


    }

    public function culminadosCuadrilla()
    {

        $u  = $this->usuarioppal();
        if ($u->coord_print != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        return view('asignacion.consultarCaso');
    }


    public function mostrarAsignacion($id)
    {
        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id );
        $asignacion = Asignacion::where('caso_id',$id)->first();
        $lider = User::select('users.name AS nombre_l', 'users.lastname AS apellido_l', 'users.email AS correo_l', 'users.estado AS estado_l')->where('id', $asignacion->lider_usuario_id)->first();

        return view('asignacion.mostrarAsignacion')->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('lider', $lider);
    }

    public function correo(){

        $this->data = array('mensaje1' => "Esto deberia ser la variable equis",
        'mensaje2' => "Esto deberia ser la variable yie",
        'mensaje3' => "Esto deberia ser la variable seta" );

        Mail::send('mail.correo', $this->data, function($message){
            $message->from('sistema-advance@jhcp.com', 'un mensaje mas');
            $message->to("sistema-advance@jhcp.com")
            ->subject("Este es el titulo del correo, por ejemplo, hola Juancho.");
        });
    }

    public function esperaAprobacion(){

        $u  = $this->usuarioppal();
        if ($u->coord_update != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        return view('asignacion.esperarAprobacion');
    }

    public function consulta($id){

        $u  = $this->usuarioppal();
        if ($u->coord_update != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id );
        $asignacion = Asignacion::select()->where('caso_id', $folio->id)->first();
        $levantamiento = Levantamiento::select()->where('asignacion_id', $asignacion->id)->first();
        $precio = Precio::where("asignacion_id", $asignacion->id)->first();

        return view('levantamiento.consultando')->with('precio', $precio)->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('levantamiento',$levantamiento)->with('asignacion', $asignacion);
    }

    public function cambiandoResultado(Request $request, $id){
        dd("Cambiando resultado del id ".$id);
    }

    public function consulCaso($id)
    {

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $operador = DB::table("vw_procedimiento_general")->where('id_operador', $id)->first();
        $coord_jhcp = User::where('id', $operador->coordinador_jhcp_id)->first();
        $ope_creador = User::where('id', $operador->operador_creador_id)->first();
        $lider_cuadrilla = User::where('id', $operador->lider_usuario_id)->first();


        return view('asignacion.consultaDeAvance')->with('operador', $operador)->with('coord_jhcp', $coord_jhcp)->with('ope_creador', $ope_creador)->with('lider_cuadrilla', $lider_cuadrilla)->with('id', $id);
    }

    public function consultarHistorialImagenes($id){

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $datos = DB::table('vw_primera_lista_imagenes')->where('id', $id)->first();
        $img = DB::table('vw_img')->where('id_seg', $id)->get();
        $caso = Operador::where('id', $datos->caso_id)->first();

        return view('asignacion.consultarImagen')->with('datos', $datos)->with('imagenes', $img)->with('id', $id)->with('caso', $caso);
    }

    public function casosEnEjecucion($id)
    {
        $caso = Operador::find($id);

        return view('asignacion.consultarCasoEspecifico')->with(["id_ruta" => $id, "caso" => $caso]);
    }

    public function consultarHistorialImagenes2($id, $id2){

        $datos = DB::table('vw_primera_lista_imagenes')->where('id', $id)->first();
        $img = DB::table('vw_img')->where('id_seg', $id)->get();
        $caso = Operador::where('id', $datos->caso_id)->first();

        return view('asignacion.consultarImagen2')->with('datos', $datos)->with('imagenes', $img)->with('id', $id)->with('regresar', $id2);
    }


//----------------  jquery ----------------------------
    public function jq_lista(){

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        if($u->operador == 1){
            return datatables()
            ->eloquent(Operador::query()->orderBy('correctivo', 'DESC'))
            ->addColumn('btn','asignacion.btn')
            ->rawColumns(['btn'])
            ->toJson();
        } else {
            return datatables()
            ->eloquent(Operador::query()->where("coordinador_jhcp_id", \Auth::user()->id)->orderBy('correctivo', 'DESC'))
            ->addColumn('btn','asignacion.btn')
            ->rawColumns(['btn'])
            ->toJson();
        }

    }

    public function jq_listadoDeImagen($id){
        $query = DB::table('vw_primera_lista_imagenes')->where('caso_id', $id)->orderBy('id', 'DESC')->get();

        return datatables()->of($query)
        ->addColumn('btn','asignacion.btnImagenesLista')
        ->rawColumns(['btn'])->toJson();

    }

    public function identificar($id){

        $u  = $this->usuarioppal();
        if ($u->coord_listado != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $lider_c = User::where('id', $id)->get();
        return response()->json($lider_c);
    }

    public function esperando(){

        return datatables()
        ->eloquent(
            Operador::query()->orderBy('correctivo', 'DESC')->whereIn('disponibilidad', ["evaluando","esperando aprobación", "en espera del cliente"])
        )
        ->addColumn('btn','<a href="{{ route("asignacion.consultar",$id) }}"><button title="Ver el fólio" id="ver" class="btn btn-primary fa fa-sticky-note"></button></a>')
        ->rawColumns(['btn'])
        ->toJson();

    }


    public function listadoCulminado()
    {
        return datatables()
        ->eloquent(Operador::query()->where("coordinador_jhcp_id", \Auth::user()->id)->where('disponibilidad', 'cerrado por lider')->orWhere('disponibilidad','cerrado por coord')->orderBy('correctivo', 'DESC'))
        ->addColumn('btn','asignacion.btnCulm')
        ->rawColumns(['btn'])
        ->toJson();
    }


    public function borrarImagen($id_imagen, $id_seg)
    {

        $d = Imagen::find($id_imagen);

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {



            $cadena = str_replace('/','\\', $d->ruta_imagenes);
        } else {
            $cadena = $d->ruta_imagenes;
        }

        unlink(public_path($cadena));

        $borrar = $d->seguimientos()->detach($id_seg);
        return response()->json($borrar);

    }

    public function reactivando($id)
    {
        $caso = Operador::find($id);
        $caso->disponibilidad = "ejecutando";
        $valida = $caso->update();
        return response()->json($valida);
    }

    public function finalizarCoord($id)
    {
        $fin = Operador::find($id);
        $fin->disponibilidad = "cerrado por coord";
        $result = $fin->save();

        return response()->json($result);
    }

    public function enEjecucion()
    {

         return datatables()
        ->eloquent(Operador::query()->where("coordinador_jhcp_id", \Auth::user()->id)->where('disponibilidad', ['disponible'])->orWhere('disponibilidad', ['asignado'])->orderBy('correctivo', 'DESC'))
        ->addColumn('btn','asignacion.btn')
        ->rawColumns(['btn'])
        ->toJson();

    }

    public function enEjecucionCoord()
    {

        // return datatables()
        // ->eloquent(Operador::query()->where("coordinador_jhcp_id", \Auth::user()->id)->where('disponibilidad', 'disponible')->orderBy('correctivo', 'DESC'))
        // ->addColumn('btn','asignacion.btnConsultarObra')
        // ->rawColumns(['btn'])
        // ->toJson();

        return datatables()
        ->eloquent(Operador::query()->where("coordinador_jhcp_id", \Auth::user()->id)->where('disponibilidad', ['ejecutando'])->orderBy('correctivo', 'DESC'))
        ->addColumn('btn','asignacion.btnConsultarObra')
        ->rawColumns(['btn'])
        ->toJson();

    }

    public function jq_listadoDeImagen2($id){

        $query = DB::table('vw_primera_lista_imagenes')->where('caso_id', $id)->orderBy('id', 'DESC')->get();

        return datatables()->of($query)
        ->addColumn('btn','asignacion.btnImagenesLista2')
        ->rawColumns(['btn'])->toJson();
    }



    public function jq_ejecutandoCoord()
    {

        return datatables()
        ->eloquent(Operador::query()->where("coordinador_jhcp_id", \Auth::user()->id)->where('disponibilidad', ['disponible','asignado'])->orderBy('correctivo', 'DESC'))
        ->addColumn('btn','asignacion.btn')
        ->rawColumns(['btn'])
        ->toJson();

    }

}
