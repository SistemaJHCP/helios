@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
<style>
    .well{background: white}
</style>
@endsection
@section('mini-cabecera')
<h1>
    Configuración
    <small>general</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-bars"> </i> General <div class="glyphicon glyphicon-menu-left"></div>  Configuración  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-2">
    </div>
    <div class="col-lg-8 col-md-8 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <!--cambio de clave-->
            <a class="" role="button" data-toggle="collapse" href="#cambioClave" aria-expanded="false" aria-controls="collapseExample">
                    Clave maestra del sistema <i class="fa fa-key"></i>
            </a>
                <div class="collapse" id="cambioClave">
                    <div class="well">
                        <div class="form-group">
                            <form action="{{ route('general.modificar',$claveGeneral->id) }}" method="post">
                                @csrf
                                <label for="cambio">ingrese la nueva clave maestra del sistema</label>
                                <input type="text" class="form-control" name="cambio" value="{{ $claveGeneral->clave_general }}"><br>
                                <input type="submit" value="Cambiar clave" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            <!--cambio de clave-->
            <a class="" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                    Clave maestra del sistema
                </a>
                <div class="collapse" id="collapseExample3">
                    <div class="well">
                        ...
                    </div>
                </div>
                <hr>
            <!--cambio de clave-->
            <a class="" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                    Clave maestra del sistema
                </a>
                <div class="collapse" id="collapseExample3">
                    <div class="well">
                        ...
                    </div>
                </div>
                <hr>
            <!--cambio de clave-->
            <a class="" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                    Clave maestra del sistema
                </a>
                <div class="collapse" id="collapseExample4">
                    <div class="well">
                        ...
                    </div>
                </div>
                <hr>
        </div>
    </div>
    <div class="col-lg-2">
    </div>

</div>

@endsection
@section('js')
<!--
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/politics/inicio.js') }}"></script>
-->
@endsection
