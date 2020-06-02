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
        <div class="form-group" style="margin-top:40px;">
            <label for="">Seleccione el lider de cuadrilla</label>
            <select name="lider" id="lider" class="form-control">
                <option value="">Seleccione...</option>
                @foreach ($lider as $l)
                    <option value="{{ $l->id }}" {!! ($l->id == $asignacion->lider_usuario_id) ? "selected" : ""; !!}>{{ $l->name }} {{ $l->lastname }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 nav-tabs-custom" style="display: none; padding-botton:40px;" id="dv1">

        <form action="{{ route('asignacion.modificando',$folio->id) }}" method="post">

                @csrf
            <input type="hidden" name="lider_cuadrilla" id="id" value="camisa">
                <div class="box box-widget widget-user-2" style="margin-top:16px;">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header" style="background:#3c8dbc;color:white;">
                        <div class="widget-user-image">
                        <img class="img-circle" src="{{ url('imagenes/iconos/user7-128x128.jpg') }}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username"><div id="nombre"></div></h2>
                        <h5 class="widget-user-desc"><div id="correo"></div></h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <input type="hidden" id="id" value="">
                        <li><a href="#">Estado <span class="pull-right badge bg-teal"><div id="estado"></div></span></a></li>
                        <li><a href="#">Casos culminados <span class="pull-right badge bg-blue">5</span></a></li>
                        <li><a href="#">Casos asignados <span class="pull-right badge bg-aqua">12</span></a></li>
                        {{-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> --}}
                        </ul>
                    </div>

                </div>
                <center><input type="submit" value="cambiar encargado del caso" class="btn btn-primary"></center><br>
        </form>

    </div>

    <div class="col-lg-1 col-md-1 col-sm-1">

    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('js/assign/mostrar.js') }}"></script>
<script>

</script>
@endsection
