<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimiento;
use App\User;

class requerimientoController extends Controller
{

    public function usuarioppal(){
        $usuarioPrincipal = User::select()->join('permisos', 'users.permisos_id', '=', 'permisos.id')->where('users.id', \Auth::user()->id)->where('permisos.estado', 'activo')->first();
        return $usuarioPrincipal;
    }


    public function edit(Request $request)
    {
        $req = Requerimiento::find($request->id);
        return response()->json($req);
    }



    public function update(Request $request)
    {

        $request->validate([
            'producto' => 'required|max:100',
            'metrica' => 'required',
            'cantidad' => 'required|max:11'
        ]);

         $mod = Requerimiento::find($request->id);
        $mod->nombre_producto = $request->producto;
        $mod->metrica = $request->metrica;
        $mod->cantidad = $request->cantidad;

        $mod->update();

        return response()->json($mod);
    }


    public function destroy($id)
    {

        $req = Requerimiento::find($id);
        $valida = $req->delete();

        return  response()->json($valida);
    }


    public function jq_cargar_productos($id)
    {

        $query = Requerimiento::query()->where('levantamiento_id', $id)->orderBy('id', 'DESC');

        return datatables()
        ->eloquent($query)
        ->addColumn('button','requerimiento.borrar')
        ->rawColumns(['button'])
        ->toJson();
    }

    public function jq_precios(Request $request){

        $request->validate([
            'nombre' => 'required|max:100',
            'metrica' => 'required',
            'precio_p' => 'required|numeric'
        ]);

        // $u  = $this->usuarioppal();
        // if ($u->cua_print != 1) {
        //     dd("detenido");
        // }

        $r = new Requerimiento();
        $r->nombre_producto = $request->nombre;
        $r->metrica = $request->metrica;
        $r->cantidad = $request->precio_p;
        $r->levantamiento_id = $request->levantamiento;

        $valida = $r->save();

        return response()->json($valida);

    }

    public function jq_general($id){
        $query = Requerimiento::query()->where('levantamiento_id', $id)->orderBy('id', 'DESC');

        return datatables()
        ->eloquent($query)
        ->toJson();
    }


    public function jq_modUno(Request $request){

        $mod = Requerimiento::find($request->id);
        dd($mod);
        $mod->nombre_producto = $request->producto;
        $mod->metrica = $request->metrica;
        $mod->cantidad = $request->cantidad;

        $mod->update();
    }

}
