<?php

namespace App\Http\Controllers;

use App\Precio;
use Illuminate\Http\Request;
use App\Operador;

class preciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function cargarPrecios(Request $request, $id, $id2){

        $precios = new Precio();
        $precios->costo = $request->costos;
        $precios->asignacion_id = $id;
        $precios->coord_id = \Auth::user()->id;
        $precios->created_at = now();
        $precios->updated_at = now();

        $valida = $precios->save();

        if ($valida) {
            $op = Operador::find($id2);
            $op->disponibilidad = "en espera del cliente";

            $val = $op->update();
            if ($val) {
                return response()->json($valida);
            }

        } else {

            return response()->json($valida);

        }

    }


    public function cambiarPrecios(Request $request, $id, $id2){

        $precios =Precio::where('asignacion_id', $id)->first();
        $precios->costo = $request->costos;
        $precios->coord_id = \Auth::user()->id;
        $precios->updated_at = now();

        $valida = $precios->update();
        return response()->json($valida);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show(Precio $precio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $precio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio)
    {
        //
    }
}
