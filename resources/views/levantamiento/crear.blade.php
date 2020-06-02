@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Levantamiento
    <small>de la información</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-check-square-o"> </i> Levantamiento </li>
</ol>
<hr>
@endsection

@section('body')
<style>

</style>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-6 col-md-6 connectedSortable">

        <div class="nav-tabs-custom" style="padding: 16px;">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne" style="background:#3c8dbc;"  role="button"  data-toggle="collapse" data-parent="#accordion" href="#orden" aria-expanded="true" aria-controls="orden">
                    <h4 class="panel-title">
                      <a style="color:white;">
                        <b>ORDEN</b>
                      </a>
                    </h4>
                  </div>
                  <div id="orden" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Correctivo:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->correctivo }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Tipo de orden:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->orden }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Tipo de apertura:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->fecha }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Fecha de cierre:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->fecha_fin }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Sintoma:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->sintoma }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Prioridad:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->prioridad }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Siniestro:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $folio->siniestro }}
                                </div>
                            </div>

                    </div>
                  </div>
                </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne" style="background:#3c8dbc;"  role="button"  data-toggle="collapse" data-parent="#accordion" href="#detalle" aria-expanded="false" aria-controls="detalle">
                            <h4 class="panel-title">
                            <a style="color:white;">
                                <b>DETALLE</b>
                            </a>
                            </h4>
                        </div>
                        <div id="detalle" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>MOTIVO DE LA ORDEN:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->motivo }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Descripción:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->descripcion }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne" style="background:#3c8dbc;"  role="button"  data-toggle="collapse" data-parent="#accordion" href="#ubicacion" aria-expanded="false" aria-controls="ubicacion">
                            <h4 class="panel-title">
                            <a style="color:white;">
                                <b>UBICACION</b>
                            </a>
                            </h4>
                        </div>
                        <div id="ubicacion" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Usuario:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->usuario  }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Teléfono:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->telefono }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Ubicación técnica:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->u_tecnica }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Inmueble:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->inmueble }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Planta:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->planta }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Oficina:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->oficina }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>CECO:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->ceco }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Coordinador-bbva:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->coordinador_bbva }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Siniestro:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->siniestro }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Emplazamiento:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $folio->emplazamiento }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne" style="background:#3c8dbc;"  role="button"  data-toggle="collapse" data-parent="#accordion" href="#coord" aria-expanded="false" aria-controls="coord">
                            <h4 class="panel-title">
                            <a style="color:white;">
                                <b>ASIGNACION DE COORDINADOR JHCP</b>
                            </a>
                            </h4>
                        </div>






                        <div id="coord" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-xs-3">
                                            <b>Coordinador JHCP:</b>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-xs-9">
                                            {{ $coord_jhcp->name }} {{ $coord_jhcp->lastname }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-xs-3">
                                            <b>Operador:</b>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-xs-9">
                                            {{ $operador->name }} {{ $operador->lastname }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-xs-3">
                                            <b>Estado del caso:</b>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-xs-9">
                                                {{ $folio->disponibilidad }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
              </div>
        </div>

        <div class="nav-tabs-custom" style="padding: 16px;">
            <center>
                <a href="{{ route('levantamiento.index') }}"><button type="button" class="btn btn-primary btn btn-flat btn-lg"><i class="fa fa-mail-reply"></i> Regresar</button></a>
                {{-- @if($folio->disponibilidad == "evaluando")
                <a href="{{ route('levantamiento.cambiarEstado', $folio->id) }}"><button class="btn btn-success">Solicitar evaluación del operador</button></a>
                @endif --}}
            </center>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 connectedSortable">
        <div class="nav-tabs-custom" style="padding: 16px;">
            <center><h4>Indique el resultado de su evaluación</h4></center>
            <form action="{{ route('levantamiento.cargando',$asignacion->id) }}" method="post">
                @csrf
                    @if($folio->disponibilidad == "asignado")
                        <textarea name="descripcion" id="descripcion" class="form-control" style="height:180px;" placeholder="Ingrese el resumen, máximo 480 caracteres." maxlength="500">{!! ($levantamiento != NULL)  ? $levantamiento->descripcion : "" ; !!}</textarea>
                    @else
                        <textarea name="observacion" id="observacion" class="form-control" style="height:180px;" placeholder="Ingrese el resumen, máximo 480 caracteres." maxlength="500" disabled>{!! ($levantamiento != NULL)  ? $levantamiento->descripcion : "" ; !!}</textarea>
                    @endif
                <br>
                @if ($levantamiento != NULL)
                    @if($folio->disponibilidad == "evaluando" )

                    @endif
                @else
                <input type="submit" value="Agregar para cargar requerimientos" id="agregar" class="btn btn-primary btn-block">
                @endif
            </form>
        </div>



            @if($folio->disponibilidad == "evaluando")
                <div class="info-box">
                    <a href="{{ route('levantamiento.asignandoMateriales', $levantamiento->id) }}" style="cursor: default;">
                        <span class="info-box-icon" style="background:#3c8dbc;"><i class="fa fa-industry" style="color:white; margin-top:20px;" ></i></span>
                        <div class="info-box-content" style="color: black;">
                            <span class="info-box-text">Cargar materiales</span>
                            <span class="info-box-number"><small>requeridos para la obra</small></span>
                        </div>
                    </a>
                </div>
            @endif




            @if($folio->disponibilidad == "ejecutando")

                <div class="info-box">
                    <a href="{{ route('levantamiento.vistaCargaImagenes', $folio->id) }}" style="cursor: default;">
                        <span class="info-box-icon" style="background:#f39c12;"><i class="fa fa-camera" style="color:white; margin-top:20px;" ></i></span>
                        <div class="info-box-content" style="color: black;">
                            <span class="info-box-text">Cargar las imágenes</span>
                            <span class="info-box-number"><small>del informe fotográfico</small></span>
                        </div>
                    </a>
                </div>


            @endif
    </div>
    <div class="col-lg-1">
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
<script src="{{ asset('js/lifting/ver.js') }}"></script>
@if ($errors->any())
        <script>
            Swal.fire(
                'No se permiten campos vacios',
                'ni más de 500 caracteres',
                'error'
            )
        </script>
@endif

@endsection

