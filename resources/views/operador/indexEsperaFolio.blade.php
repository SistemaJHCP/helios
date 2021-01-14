@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/operator/index.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    En espera
    <small>de aprobación</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa  fa-check"> </i> En espera de aprobación <div class="glyphicon glyphicon-menu-left"></div>  Operador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-7 col-md-7 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;padding:18px;">
            <table id="example" class="table table-condensed table-striped table-bordered" id="table" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">Correctivo</th>
                        <th style="text-align: center;">Sintoma</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th style="text-align: center;">Correctivo</th>
                        <th style="text-align: center;">Sintoma</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 connectedSortable">
        <img src="{{ url('imagenes/sistemas/columna_asig.jpg') }}" alt="">
    </div>

</div>

@endsection
@section('js')
    <script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/operator/enEspera.js') }}"></script>
@endsection
