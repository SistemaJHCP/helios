@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/assign/asignar.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Fólios
    <small>en ejecución</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-calendar-check-o"></i> Ver fólios <div class="glyphicon glyphicon-menu-left"></div></i> asignación de casos <div class="glyphicon glyphicon-menu-left"></div>  Coordinador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-1">

    </div>
    <div class="col-lg-7 col-md-7 connectedSortable">

        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
                <a href="{{ route('asignacion.index') }}"><button class="btn btn-primary">Regresar</button></a>
            <table id="example" class="table table-condensed table-striped table-bordered" id="table" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">Correctivo</th>
                        <th style="text-align: center;">Sintoma</th>
                        <th style="text-align: center;">Disponibilidad</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th style="text-align: center;">Correctivo</th>
                        <th style="text-align: center;">Sintoma</th>
                        <th style="text-align: center;">Disponibilidad</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="col-lg-3">

        </div>
    <div class="col-lg-1">

    </div>

</div>

@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/assign/asignar.js') }}"></script>
<script>
    listaCoordinador();
</script>
@endsection
