@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('mini-cabecera')
<h1>
    Culminados
    <small>por lider de cuadrilla</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-calendar-check-o"> </i> Lider de cuadrilla <div class="glyphicon glyphicon-menu-left"></div>  Coordinador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-7 col-md-7 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div class="table-responsive">
                <table class="table no-margin" id="listadoCulminados">
                    <thead>
                        <tr>
                            <th style="text-align:center;">Correctivo</th>
                            <th style="text-align:center;">Sintoma</th>
                            <th style="text-align:center;">Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            uno
        </div>
    </div>

</div>

@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/assign/culminado.js') }}"></script>

@endsection
