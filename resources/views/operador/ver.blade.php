@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
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
        <div class="nav-tabs-custom" style="padding:15px;">

            <div class="row">
                <div class="col-md-3"><a href="{{ route('operador.index') }}"><button class="btn btn-primary btn-block btn-flat btn-lg"><i class="fa fa-mail-reply"></i> Regresar</button></a>
                <br>
                    <img src="{{ url('imagenes/operador/folio2.jpg') }}" class="image-responsive hidden-xs hidden-sm" width="100%">
                </div>
                <div class="col-md-9">
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
                    </div>
                </div>
            </div>
        @if($operador->id_levantamiento != NULL)
            <div class="row">
                <div class="col-md-12 connectedSortable"><br>
                    <div class="col-md-7">
                        <div class="nav-tabs-custom" style="padding: 16px;"><center><h4>Indique el requerimiento de materiales</h4></center>
                            <table id="example" class="table table-condensed table-striped table-bordered table-responsive" id="table" style="width:100%; text-align:center;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Nombre del producto</th>
                                        <th style="text-align: center;">Medida</th>
                                        <th style="text-align: center;text-transform: capitalize;">Cantidad</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        @if($operador->lev_descripcion != NULL)
                            <div class="box box-primary box-solid" style="margin-top:28px;">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Resultado de la evaluación</h3>
                                    <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div style="text-align:justify;">{{ $operador->lev_descripcion }}</div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        @endif

                        @if($operador->costos != NULL)
                            <div class="box box-primary box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Costos del servicio</h3>

                                    <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div style="font-size:19px;">{{ $operador->costos }}</div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        @endif

                        @if($seguimiento != NULL)

                            <div class="info-box" style="border:1px solid #3c8dbc;">
                                <a href="{{ route('operador.galeriaOperador', $id) }}" style="cursor: default;">
                                    <span class="info-box-icon" style="background:#3c8dbc;"><i class="fa fa-camera" style="color:white; margin-top:20px;" ></i></span>
                                    <div class="info-box-content" style="color: black;">
                                        <span class="info-box-text">Consultar</span>
                                        <span class="info-box-number"><small>informe fotográfico</small></span>
                                    </div>
                                </a>
                            </div>

                        @endif

                        @if($operador->apro_repro_observacion != NULL)
                            @if($operador->disponibilidad == "culminado")
                                <div class="box box-success box-solid" style="margin-top:28px;">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Resultado de la evaluación</h3>

                                        <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div style="text-align:justify;">APROBADO: {{ $operador->apro_repro_observacion }}</div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>

                                <center>
                                    <div class="box-body">
                                        <a class="btn btn-app bg-red" href="{{ route('operador.informeAprobatoria', $operador->id_operador) }}">
                                            <i class="fa fa-file-pdf-o"></i> Crear PDF
                                        </a>
                                    </div>
                                <center>

                            @elseif($operador->disponibilidad == "cancelado")
                                <div class="box box-danger box-solid" style="margin-top:28px;">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Resultado de la evaluación</h3>

                                        <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        CANCELADO: {{ $operador->apro_repro_observacion }}
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <center><a href="{{ route('operador.informeNegativa', $operador->id_operador) }}"><button class="btn btn-danger"><i class="fa fa-file-pdf-o"> IMPRIMIR PDF</i></button></a></center>
                                    </div>

                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        @endif

        </div>
    </div>

    <div class="col-lg-2 col-md-2"></div>
</div>

<script>

    $(document).ready( function(){
        var url = '../../requerimiento/jq/lista-de-requerimientos/' + {{ $operador->id_levantamiento }};
        $('#example').DataTable({
            "serverSide":true,
            "ajax": url,
            "columns": [
                {data: 'nombre_producto'},
                {data: 'metrica'},
                {data: 'cantidad'}
            ],
            "bLengthChange": false,
            "searching": false,
            "info": false
        });
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

</script>
@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>

@endsection
