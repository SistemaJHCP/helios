@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Políticas
    <small>y permisos</small>
</h1>
<ol class="breadcrumb">
    <li><i class="glyphicon glyphicon-ban-circle"> </i> Políticas y permisos <div class="glyphicon glyphicon-menu-left"></div>  Configuración  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-7 col-md-7 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            uno
        </div>
    </div>
    <div class="col-lg-5 col-md-5 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            dos
        </div>
    </div>

</div>

@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script>
$('.collapse').collapse()
</script>

@endsection
