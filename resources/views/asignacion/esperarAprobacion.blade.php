@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Asignación
    <small>de fólio</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-calendar-check-o"> </i> En espera de aprobación <div class="glyphicon glyphicon-menu-left"></div>  Coordinador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="container">
    <div class="col-md-7 connectedSortable nav-tabs-custom">
        <div class="nav-tabs-custom" style="padding-top:5%; padding-botton:5%;">
            <table id="example" class="table-responsive" id="table" style="width:100%;text-align:center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">Correctivo</th>
                        <th style="text-align: center;">Sintoma</th>
                        <th style="text-align: center;">Disponibilidad</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        botones
    </div>
    <div class="col-md-1">0</div>
</div>
@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/assign/espera.js') }}"></script>

@endsection
