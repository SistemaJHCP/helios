@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">

@endsection
@section('mini-cabecera')
<h1>
    Asignación
    <small>de casos</small>
</h1>
<ol class="breadcrumb">
    <li>
        <i class="glyphicon glyphicon-ban-circle"> caso <div class="glyphicon glyphicon-menu-left"></div></i>
        asignación de casos <div class="glyphicon glyphicon-menu-left"></div></i>
        Coordinador <div class="glyphicon glyphicon-menu-left"></div></i>
    </li>
</ol>
<hr>
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">1</div>
            <div class="col-md-6">2</div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('js/assign/remover.js') }}"></script>
@endsection
