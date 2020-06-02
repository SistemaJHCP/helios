@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/operator/index.css') }}">
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
@endsection
@section('mini-cabecera')
<h1>
    Consulta y creación
    <small>de folio</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-folder-o"> </i> Inicio <div class="glyphicon glyphicon-menu-left"></div>  Operador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-4 col-md-4 connectedSortable">

        <a href=""  data-toggle="modal" data-target="#myModal">
            <div class="info-box" style="margin-left:10px;">
                <span class="info-box-icon bg-green"><i class="fa fa-folder-open"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CREAR UN NUEVO</span>
                    <span class="info-box-number">FOLIO</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>

        <a href="{{ route('operador.folioEnEspera') }}">
            <div class="info-box" style="margin-left:10px;">
                <span class="info-box-icon color-palette" style="background:#6750bf;color:white;"><i class="fa fa-hourglass-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">FÓLIOS EN ESPERA</span>
                    <span class="info-box-number">DE APROBACIÓN</span>
                    <span class="info-box-text" style="color:10px">Cantidad: {{ $espera }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>

        <a href="{{ route('operador.aproCoord') }}">
            <div class="info-box" style="margin-left:10px;">
                <span class="info-box-icon bg-yellow color-palette"><i class="fa fa-bar-chart-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">FÓLIOS CERRADOS</span>
                    <span class="info-box-number">POR EL COORDINADOR</span>
                    <span class="info-box-text" style="color:10px">Cantidad: {{ $crd }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>

    <div class="nav-tabs-custom hidden-sm hidden-xs" style="margin-left:10px;">
        <img src="{{ url('imagenes/operador/folio.jpg') }}" alt="" class="img-responsive">


    </div>
    </div>
    <div class="col-lg-8 col-md-8 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
                <table id="example" class="table table-condensed table-striped table-bordered" id="table" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Correctivo</th>
                            <th style="text-align: center;">Sintoma</th>
                            <th style="text-align: center;">Estado</th>
                            <th style="text-align: center;">Acción</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th style="text-align: center;">Correctivo</th>
                            <th style="text-align: center;">Sintoma</th>
                            <th style="text-align: center;">estado</th>
                            <th style="text-align: center;">Acción</th>
                        </tr>
                    </tfoot>
                </table>
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear un nuevo portafólio</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('operador.cargar') }}" method="post"  enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <div class="form-group">
                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                        <center>
                            <label class="form-check-label" style="color:white;">
                                ORDEN
                            </label>
                        </center>
                    </div>
                    <label for="correctivo" style="margin-top:10px;">Correctivo</label>
                    <input type="text" name="correctivo" id="correctivo" pattern="[0-9]+" class="form-control" pattern="[0-9]+" placeholder="Solo se permiten números" maxlength="11" required>

                    <label for="orden" style="margin-top:10px;">Tipo de orden</label>
                    <input type="text" name="orden" id="orden" class="form-control" maxlength="50" required placeholder="Indique el orden">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha de apertura</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="fecha" class="form-control pull-right" id="fecha" placeholder="mm/dd/aaaa" required readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Fecha de cierre</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="fecha_fin" class="form-control pull-right" id="fecha_fin" placeholder="mm/dd/aaaa" required readonly>
                                </div>
                            </div>
                        </div>
                        <label>Fecha de apertura</label>

                    <label for="sintoma" style="margin-top:10px;">Sintoma</label>
                    <input type="text" name="sintoma" id="sintoma" class="form-control" maxlength="50" required placeholder="Indique el motivo dela creación del folio">

                    <label for="prioridad" style="margin-top:10px;">Prioridad</label>
                    <select name="prioridad" id="prioridad" class="form-control" required placeholder="Indique el motivo dela creación del folio">
                        <option value="">Seleccione...</option>
                        <option value="normal">Normal</option>
                        <option value="urgente">Urgente</option>
                    </select>


                    <label for="siniestro" style="margin-top:10px;">Siniestro</label>
                    <select name="siniestro" id="siniestro" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>

                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                        <center>
                            <label class="form-check-label" style="color:white;">
                                DETALLE
                            </label>
                        </center>
                    </div>

                    <label for="motivo" style="margin-top:10px;">Motivo de la orden</label>
                    <input type="text" name="motivo" id="motivo" class="form-control" maxlength="50" required placeholder="Título de la orden">

                    <label for="descripcion" style="margin-top:10px;">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" maxlength="240" required placeholder="Breve descripción del problema"></textarea>

                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                        <center>
                            <label class="form-check-label" style="color:white;">
                                UBICACION
                            </label>
                        </center>
                    </div>

                    <label for="usuario" style="margin-top:10px;">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" maxlength="20" required placeholder="Ingrese el ID del usuario">

                    <div class="form-group">
                            <label>Teléfono</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" name="telefono" id="telefono" class="form-control" maxlength="12" required placeholder="Ingrese el telefono del usuario">
                            </div>


                    <label for="u_tecnica" style="margin-top:10px;">Ubicación técnica</label>
                    <input type="text" name="u_tecnica" id="u_tecnica" class="form-control" maxlength="100" required placeholder="Ingrese los datos de la ubicación técnica">

                    <label for="inmueble" style="margin-top:10px;">Inmueble</label>
                    <input type="text" name="inmueble" id="inmueble" class="form-control" maxlength="50" required placeholder="Ingrese el inmueble">

                    <label for="planta" style="margin-top:10px;">Planta</label>
                    <input type="text" name="planta" id="planta" class="form-control" maxlength="50" required placeholder="Indique la planta">

                    <label for="oficina" style="margin-top:10px;">Oficina</label>
                    <input type="text" name="oficina" id="oficina" class="form-control" maxlength="18" required placeholder="Indique el código de la oficina">

                    <label for="ceco" style="margin-top:10px;">CECO</label>
                    <input type="text" name="ceco" id="ceco" class="form-control" maxlength="50" required placeholder="Ingrese el CECO">

                    <label for="coordinador-bbva" style="margin-top:10px;">Coordinador-bbva</label>
                    <input type="text" name="coordinador_bbva" id="coordinador-bbva" class="form-control" maxlength="50" required placeholder="Ingrese el coordinador por parte de BBVA">

                    <label for="emplazamiento" style="margin-top:10px;">Emplazamiento</label>
                    <input type="text" name="emplazamiento" id="motivo" class="form-control" maxlength="90" required placeholder="Indique la dirección del emplazamiento">
                </div>
                <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                <center>
                    <label class="form-check-label" style="color:white;padding-botton:10px;">
                        ASIGNACION DE COORDINADOR JHCP
                    </label>
                </center>
                </div>
                <label for="coordinador_jhcp" style="margin-top:10px;">Seleccione al coordinador a encargarse</label>
                <select name="coordinador_jhcp" id="coordinador_jhcp" class="form-control" style="margin-top:10px;" required>
                    <option value="">Seleccione...</option>
                    @foreach ($coord as $c)
                        <option value="{{ $c->id }}">{{ $c->name }} {{ $c->lastname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit" id="envio" class="btn btn-primary" value="Cargar folio">
                </div>
            </div>
            </form>
        </div>

    </div>
</div>

<!------ Fin del modal ---->

@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/operator/operador.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/chart.js/Chart.js') }}"></script>
<script>
    $('#fecha').datetimepicker({
        format:'dd-mm-yyyy hh:ii',
        showInputs: false
    });

    $('#fecha_fin').datetimepicker({
        format:'dd-mm-yyyy hh:ii',
        showInputs: false
    });
</script>
@if ($errors->any())
    <script>
        Swal.fire(
        'No deben quedar campos vacios',
        'en el formuario del folio',
        'error'
        )
    </script>
@endif
@endsection
