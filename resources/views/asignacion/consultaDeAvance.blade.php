@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Políticas
    <small>y permisos</small>
</h1>
<ol class="breadcrumb">
    <li><i class="glyphicon glyphicon-ban-circle"> </i> Políticas y permisos <div class="glyphicon glyphicon-menu-left"></div>  Configuración  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-7 col-md-7 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <table id="example" class="table table-condensed table-striped table-bordered switch" id="table" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">Listado de imagenes</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">




            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne" style="background:#3c8dbc;color:white;">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>ORDEN</b>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Correctivo:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->correctivo }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Tipo de orden:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->orden }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Fecha de apertura:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->fecha }}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Fecha de cierre:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->fecha_fin }}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Sintoma:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->sintoma }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Prioridad:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->prioridad }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-3">
                                <b>Siniestro:</b>
                            </div>
                            <div class="col-lg-9 col-md-9 col-xs-9">
                                {{ $operador->siniestro }}
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
                                    <b>Motivo de la orden:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->motivo }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Descripción:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->descripcion }}
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
                                    {{ $operador->usuario  }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Teléfono:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->telefono }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Ubicación técnica:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->u_tecnica }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Inmueble:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->inmueble }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Planta:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->planta }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Oficina:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->oficina }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>CECO:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->ceco }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Coordinador-bbva:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->coordinador_bbva }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Siniestro:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->siniestro }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-3">
                                    <b>Emplazamiento:</b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9">
                                    {{ $operador->emplazamiento }}
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
                                    {{ $ope_creador->name }} {{ $ope_creador->lastname }}
                                </div>
                            </div>

                            @if($operador->lider_usuario_id)
                            <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-xs-3">
                                        <b>Lider de cuadrilla:</b>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-xs-9">
                                        {{ $lider_cuadrilla->name }} {{ $lider_cuadrilla->lastname }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <center><a href="{{ route('asignacion.culminadosCuadrilla') }}"><button class="btn btn-primary btn-lg btn-flat"><i class="fa fa-mail-reply"></i> Regresar</button></a></center>
        </div>
    </div>

</div>

@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script>
    $('#example').DataTable({
        serverSide: true,
        ajax: "http://192.168.1.150/helios/public/asignacion/jq/listadoDeImagenes/" + {{ $id }},
        columns: [
            {data: 'btn'}
        ],
        pageLength : 3,
        bLengthChange: false,
        searching: true,
        "order": [[ 0, "desc" ]],
        info: false
    });
</script>
@endsection
