@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Levantamiento
    <small>de la información</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-check-square-o"> </i> Levantamiento </li>
</ol>
<hr>
@endsection

@section('body')
<style>
table.dataTable tbody td {
    padding: 8px 10px;
    text-transform: capitalize;
}
</style>
<div class="row">

    <div class="col-lg-4 ">

        <div class="box-body">

            <a class="btn btn-app btn-block" style="background:#f39c12;color:white;" id="asignacion">
              <i class="fa fa-thumbs-up"></i> Proyectos asignados
            </a>
            <a class="btn btn-app btn-block" style="background:#596d82;color:white;" id="esperandoA">
              <i class="fa fa-check-square-o "></i> Esperando aprobación
            </a>
            <a class="btn btn-app btn-block" style="background:#001F3F;color:white;" id="enEspera">
              <i class="fa fa-pause"></i> En espera del cliente
            </a>
            <a class="btn btn-app btn-block" style="background:#00a65a;color:white;" id="ejecucion">
              <i class="fa fa-wrench"></i> Proyectos en ejecución
            </a>
            <a class="btn btn-app btn-block" style="background:#3c8dbc;color:white;" id="culminados">
              <i class="fa fa-flag-checkered"></i> Proyectos culminados
            </a>
            <a class="btn btn-app btn-block" style="background:#d33724;color:white;" id="cancelado">
              <i class="fa  fa-close"></i> Proyectos cancelados
            </a>
            <a class="btn btn-app btn-block" style="background:#161c57;color:white;" id="cerraLider">
              <i class="fa fa-user"></i> Culminados por {{ \Auth::user()->name }}
            </a>
          </div>


        <div style="margin-left:15px;">
            <div class="info-box" id="todos">
                <span class="info-box-icon" style="background:#39CCCC;color:white;"><i class="fa fa-edit"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Todos los</span>
                    <span class="info-box-text">proyectos</span>
                </div>
            </div>
        </div>




    </div>
    <div class="col-lg-7 col-md-7 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;18px;padding:18px;">
        <table id="example" class="table table-condensed table-striped table-bordered switch" id="table" style="width:100%; text-align:center;">
            <thead>
                <tr>
                    <th style="text-align: center;">Correctivo</th>
                    <th style="text-align: center;">Sintoma</th>
                    <th style="text-align: center;text-transform: capitalize;">Estado</th>
                    <th style="text-align: center;">Acción</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th style="text-align: center;">Correctivo</th>
                    <th style="text-align: center;">Sintoma</th>
                    <th style="text-align: center;">Estado</th>
                    <th style="text-align: center;">Acción</th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
    <div class="col-lg-1">
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/lifting/inicio.js') }}"></script>
@endsection
