@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Cargar
    <small>de materiales</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-check-square-o"> </i> Levantamiento </li>
</ol>
<hr>
@endsection

@section('body')

<div class="container">
    <div class="col-md-7 connectedSortable" style="background:white; padding:16px">
        <center><h3>Materiales necesarios para la ejecución del proyecto</h3></center>
        <table id="example" class="table-responsive table-striped table-bordered" id="table" style="width:100%; text-align:center;">
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
                    <input type="hidden" id="levantamiento" value="{{ $levantamiento_general->id_levantamiento }}">
                    <input type="hidden" id="identificador">

                    <label>Cantidad</label>
                    <input type="text" name="precio_p" id="precio_p" maxlength="15" pattern="[0-9]+(,)" class="form-control" required placeholder="solo números." title="Solo ingresar números">
                    <br>

                    <center>
                            <button class="btn btn-primary" id="enviar">Agregar al listado</button>
                            <button class="btn btn-warning" id="modificar" disabled>Realizar modifición</button>
                    </center>

                </div>

        </div> <br>
        <div class="nav-tabs-custom" style="padding: 16px; text-align:center;">
            <a href="{{ route('levantamiento.index') }}"><button class="btn btn-danger" style="font-size:12px;" id="enviar"><i class="fa fa-fw fa-arrow-left"></i> Regresar</button></a>
            <button class="btn btn-success" id="cerrar" value="{{ route('levantamiento.cambiarEstado',$levantamiento_general->id_caso) }}" style="margin:4px; font-size:12px;">Solicitar validación</button>
        </div>
        <div class="info-box"  data-toggle="modal" data-target="#datosRequerimientos">
            <span class="info-box-icon bg-light-blue color-palette"><i class="fa fa-file-text-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text" style="user-select: none;">Ver datos</span>
                <span class="info-box-number" style="user-select: none;"> de la solicitud</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-lg-1">
    </div>
</div>

<div class="modal fade" id="datosRequerimientos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Resumen del fólio</h4>
        </div>
        <div class="modal-body">
            <table class="table table-condensed">
                <tr>
                    <td><b>Correctivo: </b></td><td> {{ $levantamiento_general->correctivo }}</td>
                </tr>
                <tr>
                    <td><b>Orden: </b></td><td> {{ $levantamiento_general->orden }}</td>
                </tr>
                <tr>
                    <td><b>Fecha: </b></td><td> {{ $levantamiento_general->fecha }}</td>
                </tr>
                <tr>
                    <td><b>Prioridad: </b></td><td> {{ $levantamiento_general->prioridad }}</td>
                </tr>
                <tr>
                    <td><b>Motivo: </b></td><td> {{ $levantamiento_general->motivo }}</td>
                </tr>
                <tr>
                    <td><b>Descripción: </b></td><td> {{ $levantamiento_general->caso_descripcion }}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>

@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
<script src="{{ asset('js/lifting/materiales.js') }}"></script>
<script>
    var url = '../../requerimiento/jq/lista-de-requerimientos/' + {{ $levantamiento_general->id_levantamiento }};
    $('#example').DataTable({
        serverSide:true,
        ajax: url,
        columns: [
            {data: 'nombre_producto'},
            {data: 'metrica'},
            {data: 'cantidad'},
            {data: 'button'}
        ],
        bLengthChange: false,
        searching: false,
        info: false,
        lengthMenu: [8]
    });
</script>
@endsection
