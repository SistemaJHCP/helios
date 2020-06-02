<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Permisos;
Use Alert;
use Session;
use App\General;
use Image;

class usuarioController extends Controller
{

    public function usuarioppal(){
        $usuarioPrincipal = User::select()->leftJoin('permisos', 'users.permisos_id', '=', 'permisos.id')->where('users.id', \Auth::user()->id)->where('permisos.estado', 'activo')->first();
        // dump($usuarioPrincipal);
        return $usuarioPrincipal;
    }

    public function index()
    {
        $u = $usuarioppal = $this->usuarioppal();
            if ($u->conf_create != 1) {
                Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
                return redirect()->route('home');
            }

        //$l = User::select('users.id', 'users.name AS name', 'users.lastname AS lastname', 'permisos.nombre_permisos AS nombre_permisos')->join('permisos', 'permisos.id', '=','users.permisos_id')->where('users.estado', 'activo')->get();

        $i = User::select('users.id', 'users.name AS name', 'users.lastname AS lastname', 'permisos.nombre_permisos AS nombre_permisos')->join('permisos', 'permisos.id', '=','users.permisos_id')->where('users.estado', 'inactivo')->get();

        $p = Permisos::select('nombre_permisos','id')->where('estado','activo')->orderBy('nombre_permisos', 'ASC')->get();

        return view('usuario.index')->with('permisos', $p)->with('usuario', $u)->with('inactivo', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = $usuarioppal = $this->usuarioppal();

            if ($u->conf_create != 1) {
                Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
                return redirect()->route('home');
            }

        $user = new User();

        if ($request->fotografia) {

            $extension = $_FILES['fotografia']['type'];

            if ($extension != 'image/png' && $extension != 'image/jpeg') {

                Alert::error('Hubo un error', 'El formato del archivo no es permitido');
                return back();
            }

            list($ancho, $alto, $tipo, $atributos) = getimagesize($request->fotografia);
            $ext = $request->fotografia->getclientoriginalextension();

            // echo "El alto de la imagen es: ". $alto ." y el ancho es: ". $ancho . " por ultimo la extension es ". $ext ."<br>";
            $nombre = 'usr-'.\Auth::user()->id. preg_replace('/\s\s+/', ' ', $request->nombre) ."-". preg_replace('/\s\s+/', ' ', $request->apellido) .time().".".$ext;

            //aqui se uso intervention image

            if($ancho > $alto){
                $file = Image::make($request->fotografia)->resize(440, 200)->save('imagenes/usuarios/'.$nombre);
                $trump = Image::make($request->fotografia)->resize(220, 100)->save('imagenes/usuarios/trump/'.$nombre);
            }elseif($ancho < $alto){
                $file = Image::make($request->fotografia)->resize(280, 400)->save('imagenes/usuarios/'.$nombre);
                $file = Image::make($request->fotografia)->resize(140, 200)->save('imagenes/usuarios/trump/'.$nombre);
            }elseif($ancho == $alto){
                $file = Image::make($request->fotografia)->resize(100, 100)->save('imagenes/usuarios/'.$nombre);
                $file = Image::make($request->fotografia)->resize(100, 100)->save('imagenes/usuarios/trump/'.$nombre);
            }

        $user->nombre_imagen = 'imagenes/usuarios/'.$nombre;

        } else {
            $user->nombre_imagen = "imagenes/sistemas/user.png";
        }

        $user->name = ucwords($request->nombre);
        $user->lastname = ucwords($request->apellido);
        $user->email = strtolower($request->correo);
        $user->password = bcrypt($request->clave1);;
        $user->permisos_id = $request->nivel;
        $user->email_verified_at = now();


        $valida = true;
        $valida = $user->save();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado al nuevo usuario');
            return redirect()->route('usuario.index');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado este usuario');
            return redirect()->route('usuario.index');
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
        $u = $usuarioppal = $this->usuarioppal();
        if ($u->conf_show != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $ver = User::select('users.name AS name', 'users.nombre_imagen AS ruta_url', 'users.lastname AS lastname', 'users.email AS email', 'users.permisos_id AS permisos_id', 'permisos.nombre_permisos AS nombre_permisos')->join('permisos', 'users.permisos_id','=','permisos.id')->where('users.id', $id)->first();
        $p = Permisos::find($ver->permisos_id);

        return view('usuario.ver')->with('usuario',$ver)->with('permisos',$p);
    }

    public function edit($id)
    {
        $u = $usuarioppal = $this->usuarioppal();
        if ($u->conf_modify != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $p = Permisos::select('nombre_permisos','id')->orderBy('nombre_permisos', 'ASC')->get();
        $mostrar = User::find($id);
        return view('usuario.modificar')->with('mostrar', $mostrar)->with('permisos', $p);
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
        $u = $usuarioppal = $this->usuarioppal();
        if ($u->conf_modify != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }

        $usuario = User::find($id);
        $usuario->name = $request->nombre;
        $usuario->lastname = $request->apellido;
        $usuario->permisos_id = $request->nivel;
        $valida = $usuario->update();

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha cargado la política');
            return redirect()->route('usuario.index');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado la solicitud');
            return redirect()->route('usuario.index');
        }

    }

    public function disabled($id)
    {
        $u = $usuarioppal = $this->usuarioppal();
        if ($u->conf_deshability != 1) {
            Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
            return redirect()->route('home');
        }


        $random = rand(1, 99999999999999);
        $elim = User::find($id);
        $elim->password = $random;
        $elim->estado = "inactivo";

        $valida = $elim->update();

        if($elim->id == \Auth::user()->id){
            Session::flush();
            Alert::warning('Se ha eliminado', 'al usuario que estaba conectado');
            return redirect()->route('home');
        }

        if ($valida) {
            Alert::success('solicitud procesada', 'Se ha modificado al usuario');
            return redirect()->route('usuario.index');
        } else {
            Alert::error('Hubo un error', 'No se ha podido modificar al usuario');
            return redirect()->route('usuario.index');
        }
    }

    public function recovery($id)
    {
        $u = $usuarioppal = $this->usuarioppal();
            if ($u->conf_rehability != 1) {
                Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
                return redirect()->route('home');
            }

        $general = new General();
        $claveGeneral = $general->clave_general;
        $recuperar = User::find($id);
        $recuperar->estado = "activo";
        $recuperar->password = bcrypt($claveGeneral);

        $recuperar = $recuperar->update();

        if ($recuperar) {
            Alert::success('solicitud procesada', 'Se ha reactvado al usuario, puede ingresar con la clave maestra');
            return redirect()->route('usuario.index');
        } else {
            Alert::error('Hubo un error', 'No se ha cargado al usuario');
            return redirect()->route('usuario.index');
        }
    }

    public function destroy($id)
    {
        $u = $usuarioppal = $this->usuarioppal();
            if ($u->conf_deshability != 1) {
                Alert::warning('Usted no tiene permisos', 'para realizar esta acción.');
                return redirect()->route('home');
            }
        $eliminando = User::find($id);
        $validanndo = $eliminando->delete();

        if ($validanndo) {
            Alert::success('solicitud procesada', 'Se haeliminado al usuario, no se podra recuperar');
            return redirect()->route('usuario.index');
        } else {
            Alert::error('Hubo un error', 'No se ha podido eliminar definitevamente a este usuario');
            return redirect()->route('usuario.index');
        }
    }

//---------------  jquery de los usuarios  -------------------------

    public function jqcorreo($correo)
    {
        $usuario = User::select('email')->where('email',$correo)->count();
        return  response()->json($usuario);
    }

    public function jq_usuario(){
        $sentencia = User::select()->where('estado', 'activo');
        return datatables()
        ->eloquent($sentencia)
        ->addColumn('btn','usuario.botones')
        ->addColumn('nombre_completo',function($usuario){
            return $usuario->name . ' ' . $usuario->lastname;
        })
        ->filterColumn('nombre_completo', function($query, $keyword){
            $query->whereRaw("CONCAT(users.name, ' ', users.lastname) like ? ", ["%{$keyword}%"]);
        })
        ->rawColumns(['btn'])
        ->toJson();
    }

//----------------------- restablecer --------------------------------




}
