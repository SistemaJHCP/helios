@extends('layouts.template')
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


        <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <input type="text" class="knob" value="30000" data-skin="tron" data-thickness="0.2" data-width="90" data-height="90" data-fgColor="#00a65a" data-readonly="true">
                <div class="knob-label">data-width="90"</div>
            </div>
            <div class="col-md-4">2</div>
            <div class="col-md-4">3</div>
        </div>








        <div class="progress-group">
            <span class="progress-text">Proyectos asignados a coordinadores</span>
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


