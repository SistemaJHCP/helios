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
                            <div class= "{{ $act }}">
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
        <a href="{{ route('levantamiento.index') }}"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</button></a>
    </div>

    <div class="col-md-4">
        <table class="table table-hover" style="margin-top:10px;">
            <thead>
                <tr>
                    <th style="background: rgba(60, 141, 188,0.9); color:white; text-align:center;">DESCRIPCION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Nombre del lider de cuadrilla: </b>  {{ $datos->nombre}}</td>
                </tr>
                <tr>
                    <td><b>Procesos Realizados: </b>{{ $datos->avance }}</td>
                </tr>
                <tr>
                    <td><b>Fecha y hora: </b> {{ $datos->created_at }} </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#eliminarImagenes">
                                    <i class="glyphicon glyphicon-plus-sign"></i> Agregar fotos al caso
                                </button>
                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
    <div class="col-md-1"></div>
</div>


<!-- Modal -->
<div class="modal fade" id="eliminarImagenes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
    </div>
    <div class="modal-body">
        <div id="vis2">
            <p>Por favor agregue las imágenes de la obra del día: </p>
            <p><div id="ava"></div></p>

            <form action="{{ route('levantamiento.modCargaImagenes', [$datos->caso_id, $datos->id]) }}"  style="height: 300px; overflow: scroll;" class="dropzone" id="dropzone" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id2" name="id2" value="">
            </form>

        </div>
    </div>
    <div class="modal-footer">

        <a href="{{ url()->current() }}">  <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-refresh" style="color:white;"></i> Refrescar la página</button></a>
    </div>
    </div>
</div>
</div>



@endsection
@section('js')
<script>
$('#eliminarImagenes').on('shown.bs.modal', function () {

  Dropzone.options.myDropzone = {
    autoProcessQueue: false,
    uploadMultiple: true,
    paramName: "file",
    parallelUploads: 2,
    maxFilesize: 7,
    init: function(){
        var submitButton = document.querySelector("#enviarImg");
        myDropzone = this;

        submitButton.addEventListener("click", function(e){
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });

        this.on("addEvent", function(file){
            alert("se agregó un archivo.")
        });

        this.on("complete", function(file){
            myDropzone.removeFile(file)
            alert("se cargaron todos los archivos (que es lo que busco).")
        });
    }
}


})





</script>
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
@endsection
