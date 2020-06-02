@extends('layouts.template')
@section('css')

@endsection
@section('mini-cabecera')
<h1>
    Consulta
    <small>de folio</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-folder-o"> </i> Consultar <div class="glyphicon glyphicon-menu-left"></div>  Operador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-2 col-md-2"></div>

    <div class="col-lg-8 col-md-8 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div class="row">

                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <img src="{{ url('imagenes/operador/ope-ver.jpg') }}" alt="" class="img-responsive">
                </div>

                <div class="col-lg-9 col-md-9 col-xs-12">

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
                                                <b>Fecha de apertura:</b>
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

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <center><a href="{{ url()->previous() }}"><button class="btn btn-primary">Regresar</button></a></center>
                    </div>
        </div>
    </div>
</div>
    <div class="col-lg-2 col-md-2"></div>
</div>


@endsection
@section('js')

@endsection
