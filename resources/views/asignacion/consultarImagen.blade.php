@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">

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
<div class="container">
    <div class="col-md-1 container"></div>
    <div class="col-md-6 img-responsive">
        <!-- carousel -->

            <div class="box-body" style="background: rgba(60, 141, 188,0.9);">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php

                        $cont = "0";
                        foreach ($imagenes as $i){

                            if ($cont == 0) {
                            $activo = "active";
                            } else {
                            $activo = "";
                            }
                            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$cont.'" class="'.$activo.'"></li>';
                            $cont = $cont + 1;
                        }

                    ?>

                </ol>
                <div class="carousel-inner">
                <?php $act = "item active"; ?>

                    @if (count($imagenes) < 1)
                    <div class= "{{ $act }}">
                        <center><img src="{{ url("imagenes/correctivos/en-espera.jpg") }}" alt="sin imágen definida"></center>
                    </div>

                    @else
                        @foreach($imagenes AS $im)
                            <div class= "{{ $act }}" id="carusel">
                                <center><img src="{{ url($im->ruta) }}" alt="Cargando imágenes"></center>
                            </div>
                            <?php $act = "item"; ?>
                        @endforeach
                    @endif
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
        <br>
        <a href="{{ route('asignacion.culminadosCuadrilla') }}"><button class="btn btn-primary btn-lg btn-flat"><i class="fa fa-mail-reply"></i> Regresar</button></a>
    </div>

    <div class="col-md-4">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background: rgba(60, 141, 188,0.9); color:white;">
              <div class="widget-user-image">
                <img class="img-circle" src="{{ url($datos->imagen) }}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $datos->nombre }}</h3>
              <h5 class="widget-user-desc">Nombre del lider de cuadrilla</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                {{-- <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li> --}}
                <li><a href="#" style=""><b>Procesos Realizados: </b><br> {{ $datos->avance }}</a></li>
                <li><a href="#"><b>Fecha: </b><span class="pull-right badge bg-aqua">{{ $datos->created_at }}</span></a></li>
                <li>
                    <a href="#">
                        <br>
                            <button type="button" class="btn btn-danger btn-flat btn-block" data-toggle="modal" data-target="#eliminarImagenes">
                                <i class="glyphicon glyphicon-plus-sign"></i> Eliminar una imagen
                            </button>
                        <br>
                    </a>
                </li>

              </ul>
            </div>
          </div>






























    </div>
    <div class="col-md-1"></div>
</div>


<!-- Modal -->
<div class="modal fade" id="eliminarImagenes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Elimine la imágen</h4>
    </div>
    <div class="modal-body" style="text-align:center;">
        @foreach ($imagenes as $i)
        <div class="img-responsive img-thumbnail">
            <img src="{{ url($i->ruta) }}" width="140" height="100"  alt="Responsive image"><br><br>
            <button type="button" class="btn btn-danger" id="elim" value="{{ $i->id_img }}asr34{{ $i->id_seg }}">Eliminar</button>
        </div>
        @endforeach
    </div>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/assign/remover.js') }}"></script>
@endsection
