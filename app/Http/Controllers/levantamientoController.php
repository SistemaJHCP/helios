<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Levantamiento;
use App\Asignacion;
use App\Operador;
use App\Seguimiento;
use App\Imagen;
use App\User;
use Alert;
use Image;
use File;


class levantamientoController extends Controller
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

        if ($u->cuadrilla != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        return view('levantamiento.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $u  = $this->usuarioppal();
        if ($u->cua_print != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $folio = Operador::find($id);
        $jhcp = User::find($folio->coordinador_jhcp_id);
        $operador = User::find($folio->operador_creador_id );
        $asignacion = Asignacion::select()->where('caso_id', $folio->id)->first();
        $levantamiento = Levantamiento::select()->where('asignacion_id', $asignacion->id)->first();

        return view('levantamiento.crear')->with('id', $id)->with('folio', $folio)->with('coord_jhcp', $jhcp)->with('operador',$operador)->with('levantamiento',$levantamiento)->with('asignacion', $asignacion);
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'descripcion' => 'required|max:500'
        ]);


        $asignacion = Asignacion::find($id);

        $lev = new Levantamiento;
        $lev->descripcion = $request->descripcion;
        $lev->asignacion_id = $id;
        $lev->created_at = now();
        $lev->updated_at = now();

        $tomado = $lev->save();

        if ($tomado) {
            $caso = Operador::find($asignacion->caso_id);
            $caso->disponibilidad = "evaluando";
            $valida = $caso->update();
        }

        if ($valida) {
            Alert::success('solicitud procesada', 'proceda a cargar las herramientas necesarias');
            return back();
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return back();
        }


    }

    public function cambiar($id){

        $u  = $this->usuarioppal();
        if ($u->cua_read != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $cambio = Operador::find($id);
        $cambio->disponibilidad = "esperando aprobación";

        $valida = $cambio->update();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se han cargado los requerimientos de materiales de manera correcta');
            return redirect()->route('levantamiento.index');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('levantamiento.index');
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
        dd("mostrar");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cambiandoResultado(Request $request, $id){
        $mod = Levantamiento::find($id);
        $mod->descripcion = $request->descripcion;

        $valida = $mod->update();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se han modificado el resultado de la evaluación');
            return back();
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return back();
        }

    }


    public function asignandoMateriales($id)
    {

        $u  = $this->usuarioppal();
        if ($u->cua_create != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $query = DB::table('vw_levantamiento')->where('id_levantamiento', $id)->first();

        return view('levantamiento.cargarMateriales')->with('levantamiento_general', $query);
    }




    public function vistaCargaImagenes($id){

        $caso = Operador::find($id);

        return view('levantamiento.vistaCargar')->with('id', $id)->with('caso', $caso);

    }


    public function cargaImagenes(Request $request, $id){

        $request->validate([
            'file' => 'image|max:4000'
        ]);

        $image = $request->file('file');

        // Si existe la imagen??
        if($image) {
            // creame la carpeta con el id del caso (correctivo), de existir
            // ignora esta peticion
            if (!file_exists("imagenes/correctivos/".$id)) {
                mkdir("imagenes/correctivos/".$id, 0644);
            }

            // guarda la extension del archivo subido
            $ext = $image->getclientoriginalextension();

            //creo un nombre personalizado y unico para esta peticion
            $nombre = $id.'E'.\Auth::user()->id. 'A' .rand(10000, 99999). 'T' .time().".".$ext;

            //captura el nombre original
            $imageName = $image->getClientOriginalName();

            //Estoy metiendo en un listado las caracteristicas de la imagen (Alto y ancho)
            list($ancho, $alto, $tipo, $atributos) = getimagesize($image);

            // Comparo las caracteristicas de la imagen para definir como se guardara la imagen
            $ruta = 'imagenes/correctivos/'.$id.'/'.$nombre;

            if($ancho > $alto){
                $file = Image::make($image)->resize(520, 340)->save($ruta);
            }elseif($ancho < $alto){
                $file = Image::make($image)->resize(340, 520)->save($ruta);
            }elseif($ancho == $alto){
                $file = Image::make($image)->resize(340, 340)->save($ruta);
            }

        }

        //Guardando la ruta en la tabla imagen
        $im = new Imagen();
        $im->ruta_imagenes = $ruta;
        $proceso = $im->save();
        // Si guarda la imagen, enlaza el texto con las imagenes
            if ($proceso) {
                $im->seguimientos()->attach($request->id2);
            }

    }

    public function modCargaImagenes(Request $request, $id, $id_seguimiento){

        $image = $request->file('file');

        // Si existe la imagen??
        if($image) {
            // creame la carpeta con el id del caso (correctivo), de existir
            // ignora esta peticion
            if (!file_exists("imagenes/correctivos/".$id)) {
                mkdir("imagenes/correctivos/".$id, 0644);
            }

            // guarda la extension del archivo subido
            $ext = $image->getclientoriginalextension();

            //creo un nombre personalizado y unico para esta peticion
            $nombre = $id.'E'.\Auth::user()->id. 'A' .rand(10000, 99999). 'T' .time().".".$ext;

            //captura el nombre original
            $imageName = $image->getClientOriginalName();

            //Estoy metiendo en un listado las caracteristicas de la imagen (Alto y ancho)
            list($ancho, $alto, $tipo, $atributos) = getimagesize($image);

            // Comparo las caracteristicas de la imagen para definir como se guardara la imagen
            $ruta = 'imagenes/correctivos/'.$id.'/'.$nombre;

            if($ancho > $alto){
                $file = Image::make($image)->resize(520, 340)->save($ruta);
            }elseif($ancho < $alto){
                $file = Image::make($image)->resize(340, 520)->save($ruta);
            }elseif($ancho == $alto){
                $file = Image::make($image)->resize(340, 340)->save($ruta);
            }

        }

        //Guardando la ruta en la tabla imagen
        $im = new Imagen();
        $im->ruta_imagenes = $ruta;
        $proceso = $im->save();
        // Si guarda la imagen, enlaza el texto con las imagenes

            if ($proceso) {
                $im->seguimientos()->sync($id_seguimiento);
            }

    }

    public function consultarHistorialImagenes($id){
        $datos = DB::table('vw_primera_lista_imagenes')->where('id', $id)->first();
        $img = DB::table('vw_img')->where('id_seg', $id)->get();
        $caso = Operador::where('id', $datos->caso_id)->first();

        return view('levantamiento.consultarImagen')->with('datos', $datos)->with('imagenes', $img)->with('id', $id);
    }



    public function intento(){

        $intento = Seguimiento::select('id','avance')->where('caso_id', 12)->orderBy('id', 'DESC')->get();

        $arreglo = array();
        foreach($intento as $s){

            $avance[] = $s->avance;

            $imagen = DB::table('vw_lista_imagenes')->where('seguimiento_id', $s->id)->orderBy('id', 'ASC')->limit('3')->get();

            if (count($imagen) < 1) {
                $ruta[] = "imagenes/correctivos/en-espera.jpg";
            } else {
                for ($i=0; $i < count($imagen); $i++) {
                    $ruta[$i] = $imagen[$i]->ruta_imagen;
                }
            }

            array_push($arreglo, [$avance, $ruta]);
            unset($avance, $ruta);


        }
        dump($arreglo);

    }

//---------------------------------  jquery  ----------------------------------------------

    public function jqIndexMini()
    {
        $u  = $this->usuarioppal();
        if($u->operador == 1){
            $query = DB::table('vw_mini_levantamiento_index');
        } else {
            $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id);
        }

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function jsGuardarSeguimiento(Request $request,$id){
        $seg = new Seguimiento();
        $seg->avance = $request->avance;
        $seg->caso_id = $id;
        $seg->fotografo = \Auth::user()->id;

        $val = $seg->save();



        if($val){
            $datos = Operador::find($id);
            $ava = Seguimiento::find($seg->id);

            return response()->json([$datos,$seg->id, $ava]);
        }else{
            return response()->json("empty");
        }
    }

    public function jq_listadoDeImagen($id){
        $query = DB::table('vw_primera_lista_imagenes')->where('caso_id', $id)->orderBy('id', 'DESC')->get();

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnImagenesLista')
        ->rawColumns(['btn'])->toJson();
        // return response()->json($query);
    }

    public function culminados()
    {
        $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)
        ->where('disponibilidad','culminado');

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }


    public function cerradoLider()
    {
        $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)
        ->where('disponibilidad','cerrado por lider');

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }


    public function ejecucion()
    {
        $u  = $this->usuarioppal();

        if($u->operador == 1){
            $query = DB::table('vw_mini_levantamiento_index')->where('disponibilidad','ejecutando');
        } else {
            $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)->where('disponibilidad','ejecutando');
        }


        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function levApro()
    {
        $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)
        ->where('disponibilidad','esperando aprobación');

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function cancelados()
    {
        $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)
        ->where('disponibilidad','cancelado');

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function espera()
    {
        $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)
        ->where('disponibilidad','en espera del cliente');

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }


    public function asignacion()
    {
        $query = DB::table('vw_mini_levantamiento_index')->where('lider_usuario_id', \Auth::user()->id)
        ->where('disponibilidad','asignado');

        return datatables()->of($query)
        ->addColumn('btn','levantamiento.btnIndex')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function jq_culminarCaso($id){

        $u  = $this->usuarioppal();
        if ($u->cua_print != 1) {
            dd("detenido");
        } else {
            $mod = Operador::find($id);
            $mod->disponibilidad = "cerrado por lider";
            $val = $mod->save();
            return response()->json($val);
        }
    }


}
