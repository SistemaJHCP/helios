@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Revisión
    <small>de la información</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-check-square-o">  </i> En espera de aprobación<i class="glyphicon glyphicon-menu-left"> </i> Coordinador </li>
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
                                    <table style="margin-left:14px;">
                                        <tr>
                                            <td><b>Coordinador JHCP: &nbsp; </b></td>
                                            <td> &nbsp; {{ $coord_jhcp->name }} {{ $coord_jhcp->lastname }}</td>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td><b>Operador:&nbsp;  </b></td>
                                            <td> &nbsp; {{ $operador->name }} {{ $operador->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Estado del caso: &nbsp; </b></td>
                                            <td style="text-transform: capitalize;"> &nbsp; {{ $folio->disponibilidad }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
        </div>

        <div class="nav-tabs-custom" style="padding: 16px;">
            <center>
                <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
            </center>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 connectedSortable">
        <div class="nav-tabs-custom" style="padding: 16px;">
            <center><h4>Indique el resultado de su evaluación</h4></center>
            <form action="{!! ($levantamiento != NULL)  ? route('levantamiento.cambiandoResultado',$levantamiento->id) : route('levantamiento.cargando',$asignacion->id) ; !!}" method="post">
                @csrf
                    <textarea name="descripcion" id="descripcion" class="form-control" style="height:180px;" placeholder="Ingrese el resumen, máximo 480 caracteres." maxlength="500" required>{!! ($levantamiento != NULL)  ? $levantamiento->descripcion : "" ; !!}</textarea>
                <br>

                    <input type="submit" value="modificar la cargar de requerimientos" id="agregar" class="btn btn-warning btn-block">


            </form>
        </div>
        <div class="nav-tabs-custom" style="padding: 16px;text-align:justify;">
            <h4>Enviar la solicitud del lider de cuadrilla al operador para su debida aprobación</h4><br>
            <button type="submit" id="aprobacion" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-block">Enviar solicitud al operador</button>
        </div>
    </div>
    <div class="col-lg-1">
    </div>
</div>
@if($folio->disponibilidad = "esperando aprobación" )
<div class="row" id="ocultar">
        <div class="col-md-1"></div>
        <div class="col-md-4  connectedSortable">
            <div class="nav-tabs-custom" style="padding: 16px;">

                    <center><h4>Ingrese el material requerido</h4></center>

                    <div class="form-group">
                        <label>Nombre del producto</label>
                        <input type="text" name="nombre_p" id="nombre_p" maxlength="100" class="form-control" required placeholder="Breve descripción del requrimiento.">
                        <label>Unidad de medida</label>
                        <select name="metrica" id="metrica" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="M">M</option>
                            <option value="PZA">PZA</option>
                            <option value="SAL">SAL</option>
                            <option value="M2">M2</option>
                            <option value="SERV">SERV</option>
                            <option value="M3">M3</option>
                            <option value="ML">ML</option>
                            <option value="KG">KG</option>
                            <option value="Otros">Otros</option>
                        </select>
                        <input type="hidden" id="levantamiento" value="{{ $levantamiento->id }}">

                        <input type="hidden" id="identificador">


                        <label>Cantidad</label>
                        <input type="text" name="precio_p" id="precio_p" maxlength="15" pattern="[0-9]+(,)" class="form-control" required placeholder="solo números." title="Solo ingresar números">
                        <br>
                        <center>
                            <button class="btn btn-primary" id="enviar">Agregar al listado</button>
                            <button class="btn btn-warning" id="modificar" disabled>Realizar modifición</button>
                        </center>
                    </div>

            </div>
        </div>
        <div class="col-md-6  connectedSortable">
            <div class="nav-tabs-custom" style="padding: 16px;"><center><h4>Indique el requerimiento de materiales</h4></center>
                <table id="example" class="table table-condensed table-striped table-bordered table-responsive" id="table" style="width:100%; text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Nombre del producto</th>
                            <th style="text-align: center;">Medida</th>
                            <th style="text-align: center;text-transform: capitalize;">Cantidad</th>
                            <th style="text-align: center;">Acción</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

@endif

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom" style="padding: 16px;text-align:justify;">
                    <center><h4>Indique el monto total aprobado para realizar esta solicitud</h4></center>
                    <input type="text" name="costos" value="{{ ($precio == NULL) ? "" : $precio->costo }}" class="form-control" id="costos" placeholder="Indique el costo total" maxlength="18" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="{{ ($precio == NULL) ? "cargarMontos" : "modificarMontos" }}" value="{{ $asignacion->id }}-{{ $folio->id }}">{{ ($precio == NULL) ? "Enviar solicitud" : "Modificar solicitud"}}</button>
            </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready( function(){
            var url = 'http://192.168.1.150/helios/public/requerimiento/jq/lista-de-requerimientos/' + {{ $levantamiento->id }};
            $('#example').DataTable({
                "serverSide":true,
                "ajax": url,
                "columns": [
                    {data: 'nombre_producto'},
                    {data: 'metrica'},
                    {data: 'cantidad'},
                    {data: 'button'}
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
<script src="{{ asset('js/required/ver.js') }}"></script>
@endsection

