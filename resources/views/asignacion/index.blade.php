@extends('layouts.template')
@section('css')

@endsection
@section('mini-cabecera')
<h1>
    Asignación
    <small>de caso</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-calendar-check-o"> </i> Asignación de caso <div class="glyphicon glyphicon-menu-left"></div>  Coordinador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">
<?php

    if(isset($_GET['msj'])) {
        if ($_GET['msj'] == "yves") {
        Alert::success('Se ha cargado la información de manera correcta.');
        }elseif ($_GET['msj'] == "joss") {
        Alert::success('Se ha realizado la modificación salisfactoriamente.');
        }
    }

?>
    <div class="col-lg-7">

        <div class="box box-info" style="margin-left: 14px">
            <div class="box-header with-border">
              <h3 class="box-title">Casos recientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>Correctivo</th>
                      <th>Sintoma</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ( $asig as $a )
                        <tr>
                            <td><a href="{{ route('asignacion.ver',$a->id) }}">{{ $a->correctivo }}</a></td>
                            <td>{{ $a->sintoma }}</td>
                            <td><span class="label label-success" style="text-transform: capitalize;">{{ $a->disponibilidad }}</span></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="{{ route('asignacion.mostrar') }}" class="btn btn-sm btn-default btn-flat pull-right">Ver todos los fólios</a>
            </div>
            <!-- /.box-footer -->
          </div>

    </div>


    <div class="col-lg-4">
        <a href="{{ route('asignacion.mostrar') }}">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion ion-android-document" style="font-size:40px;"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-size:16px;">Ver todos los fólios</span>
                  <span class="info-box-number"></span>
                </div>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    <center>{{ $total }} Fólios creados</center>
                </span>
            </div>
        </a>
        {{-- ------------------------ --}}

        <a href="{{ route('asignacion.esperaAprobacion') }}">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-hourglass" style="font-size:40px;"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-size:16px;">En espera de aprobación</span>
                  <span class="info-box-number"></span>
                </div>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    <center>{{ $en_espera }} folios asignados a {{ \Auth::user()->name }}</center>
                </span>
            </div>
        </a>

        {{-- ------------------------ --}}

        <a href="{{ route('asignacion.mostrar') }}">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="ion ion-android-document" style="font-size:40px;"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-size:16px;">Fólios en ejecución</span>
                  <span class="info-box-number"></span>
                </div>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    <center>{{ $enEjecucion }} Fólios creados</center>
                </span>
            </div>
        </a>
        {{-- ------------------------ --}}

        <a href="{{ route('asignacion.culminadosCuadrilla') }}">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-cogs" style="font-size:40px;"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Culminados por Lider de cuadrilla</span>
                  <span class="info-box-number"></span>
                </div>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    <center>{{ $culLid }} proyectos en ejecución</center>
                </span>
            </div>
        </a>

        {{-- ------------------------- --}}
        <a href="">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-ban" style="font-size:40px;"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Proyectos cancelados</span>
                    <span class="info-box-number"></span>
               </div>
               <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
                </div>
            <span class="progress-description">
                <center>{{ $cancelado }} proyectos cancelados</center>
            </span>
            <!-- /.info-box-content -->
            </div>
        </a>
        {{-- ------------------------- --}}

        <!-- /.info-box -->
    </div>
    <div class="col-lg-1">
    </div>

</div>

@endsection
@section('js')
<!--
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/politics/inicio.js') }}"></script>
-->
@endsection
