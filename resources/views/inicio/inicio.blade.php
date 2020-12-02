@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/Ionicons/css/ionicons.min.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Bienvenido
    <small>al sistema</small>
</h1>
<hr>
<ol class="breadcrumb">
    <li><i class=" glyphicon glyphicon-folder-open"> </i> Inicio</li>
</ol>

@endsection

@section('body')
<div class="col-md-4">
    <div style="background: white; padding:15px;">
        <p class="text-center">
            <strong>Estado de los proyectos</strong>
        </p>


        <div class="row" style="padding: 15px">
            <div class="col-md-12">
                <div class="small-box bg-green">
                    <div class="inner">
                      <h3 id="proyectosTotales">--</h3>

                      <p>Proyectos totales</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph" style="font-size: 90px"></i>
                    </div>

                </div>

        </div>


        <div class="progress-group">
            <span class="progress-text">Proyectos asignados</span>
            <span class="progress-number"><b>160</b>/200</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-aqua" style="width: 90%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Proyectos cancelados</span>
            <span class="progress-number"><b>310</b>/400</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-red" style="width: 80%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Proyectos en ejecución</span>
            <span class="progress-number"><b>480</b>/800</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Proyectos en espera de aprobacion</span>
            <span class="progress-number"><b>250</b>/500</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Proyectos finalizados</span>
            <span class="progress-number"><b>250</b>/500</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    trampa
</div>
@endsection
@section('js')
<script src="{{ asset('js/inicio.js') }}"></script>
<script src="{{ asset('plugins/bower_components/jquery-knob/js/jquery.knob.js') }}"></script>
<script>

</script>
@endsection


