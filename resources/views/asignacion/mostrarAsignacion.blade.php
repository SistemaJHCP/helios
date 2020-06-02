@extends('layouts.template')
@section('css')

@endsection
@section('mini-cabecera')
<h1>
    Asignación
    <small>de caso</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-calendar-check-o"></i> Escoger un caso <div class="glyphicon glyphicon-menu-left"></div></i> asignación de caso <div class="glyphicon glyphicon-menu-left"></div>  asignación  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-1 col-md-1 col-sm-1">

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 connectedSortable">
        <div class=" connectedSortable">

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
                                {{ $folio->orden }}
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
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 nav-tabs-custom connectedSortable">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ url('imagenes/iconos/user7-128x128.jpg') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $lider->nombre_l }} {{ $lider->apellido_l }}</h3>

                <p class="text-muted text-center">{{ $lider->correo_l }}</p>

                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Casos atendidos</b> <a class="pull-right">12</a>
                </li>
                <li class="list-group-item">
                    <b>Casos actuales</b> <a class="pull-right">5</a>
                </li>
                <li class="list-group-item">
                    <b>Asignado por:</b> <a class="pull-right"></a>
                </li>
                </ul>

                <a href="{{ URL()->previous() }}" class="btn btn-primary btn-block"><b>Regresar</b></a>
            </div>
            <!-- /.box-body -->
            </div>
    </div>


    <div class="col-lg-1 col-md-1 col-sm-1">

    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('js/assign/folio.js') }}"></script>
@endsection
