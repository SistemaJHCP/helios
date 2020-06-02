@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Aprobación o negativa
    <small>de atencion de solicitud</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-check"> </i> Evaluacion de la solicitud <div class="glyphicon glyphicon-menu-left"></div>  Operador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

<div class="col-lg-6 col-md-6 connectedSortable">
    <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
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

{{-- ------------------------------------------------------------ --}}
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#43a2d9;" role="tab" id="headingOne" style="background:#3c8dbc;"  role="button"  data-toggle="collapse" data-parent="#accordion" href="#lider" aria-expanded="false" aria-controls="lider">
                                        <h4 class="panel-title">
                                        <a style="color:white;">
                                            <b>LIDER DE CUADRILLA ASIGNADO</b>
                                        </a>
                                        </h4>
                                    </div>
                                    <div id="lider" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-xs-3">
                                                    <b>Lider de cuadrilla:</b>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-xs-9">
                                                    {{ $lider->name }} {{ $lider->lastname }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <center><a href="{{ url()->previous() }}"><button class="btn btn-primary btn btn-flat btn-lg"><i class="fa fa-mail-reply"></i> Regresar</button></a></center>
        </div>
    </div>
</div>
    <div class="nav-tabs-custom" style="margin-right:18px;padding:18px;">
        <center>

                <button class="btn btn-success" data-toggle="modal" data-target="#apro" id="aprobado100">Aprobar la ejecución</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#repro" id="negado100">No fue aprobada</button>

        </center>
    </div>
</div>

<div class="col-lg-6 col-md-6 connectedSortable">
    <div class="nav-tabs-custom" style="margin-right:18px;padding:18px;">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Resultado de su evaluación</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style="text-align:justify;">{{ $levantamiento->descripcion }}</div>
                <hr>
                Costo estimado del servicio: <b><h3>{{ $precio->costo }}</h3></b>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="nav-tabs-custom" style="margin-right:18px;padding:18px;">
        <div class="nav-tabs-custom" style="padding: 16px;"><center><h4>Requerimiento de materiales</h4></center>
            <table id="example" class="table table-condensed table-striped table-bordered table-responsive" id="table" style="width:100%; text-align:center,justify">
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

</div>

</div>
    <form action="{{ route('operador.aprobarEjecucion', $folio->id) }}" method="POST">
        @csrf
        <div class="modal fade" id="apro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Observacion sobre la aprobación del servicio</h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="3" name="observacionAprobado" maxlength="300" id="observacion" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" id="aprov" class="btn btn-success" value="Aprobada la ejecución">
                </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('operador.eliminarEjecucion', $folio->id) }}" method="POST">
        @csrf
        <div class="modal fade" id="repro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Motivo de la cancelación del servicio</h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="3" name="observacionReprobado" maxlength="300" id="observacionRep" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" id="reprov" class="btn btn-danger" value="Cancelado por el cliente">
                </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/operator/aproNega.js') }}"></script>
<script>
    $(document).ready( function(){
        var url = 'http://192.168.1.150/helios/public/requerimiento/jquery/listadoSimple/' + {{ $levantamiento->id }};
        $('#example').DataTable({
            serverSide:true,
            ajax: url,
            columns: [
                {data: 'nombre_producto'},
                {data: 'metrica'},
                {data: 'cantidad'}
            ],
            bLengthChange: false,
            searching: false,
            info: false,
            pageLength: 5
        });
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <script>
                    Swal.fire(
                        'No puede dejar',
                        'el campo vacio.',
                        'error'
                    )
                </script>
            @endforeach
        </ul>
    </div>
@endif
@endsection
