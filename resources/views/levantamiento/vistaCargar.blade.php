{{ dump($id) }}
@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/lifting/listado.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/Ionicons/css/ionicons.min.css') }}">

@endsection
@section('mini-cabecera')
<h1>
    Carga
    <small>del avance diario</small>
</h1>
<ol class="breadcrumb">
    <li> <i class="fa fa-check-square-o"></i>Carga de avances <i class="glyphicon glyphicon-chevron-left"> </i> Levantamiento</li>
</ol>
<hr>
@endsection
@section('body')

<div class="container">
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="box box-info">
            {{-- <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>
            </div> --}}
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example" class="table table-condensed table-striped table-bordered switch" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Listado de imagenes</th>
                            </tr>
                        </thead>
                    </table>
                </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            {{-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div> --}}
            <!-- /.box-footer -->
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="info-box col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#myModal4">
            <span class="info-box-icon" style="background:#00a65a; color:white;"><i class="fa fa-camera"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> &nbsp;</span>
              <span class="info-box-text">CARGAR LOS</span>
              <span class="info-box-text">AVANCES DEL DIA</span>
            </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Indique el avance de la obra</h4>
            </div>
            <div class="modal-body">
                <div id="vis1">

                    <p>Ingrese un resumen de las acciones realizadas a nuestros clientes el dia de hoy</p>
                    <textarea name="avance" id="avance" placeholder="Máx. 290 caracteres." class="form-control" style="height:140px;" maxlength="290"></textarea>
                    <input type="hidden" id="id" name="id" value="{{ $id }}">
                    <br><br>
                    <button type="submit" id="submit" class="btn btn-primary form-control">Guardar y continuar</button>
                </div>
                <div id="vis2" style="display: none;">
                    <p>Por favor agregue las imágenes de la obra del día: </p>
                    <p><div id="ava"></div></p>

                    <form action="{{ route('levantamiento.cargaImagenes', $id) }}"  style="height: 300px; overflow: scroll;" class="dropzone" id="dropzone" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            <div class="icon">
                                <svg width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-cloud-arrow-down-fill" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
                                </svg>
                            </div>
                            Solo se deben de cargar imágenes <br> (Tamaño máximo 10mb)
                        </div>
                        <input type="hidden" id="id2" name="id2" value="">
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <div id="vis3" style="display: none;">
                    <a href="{{ route('levantamiento.index') }}">  <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-refresh" style="color:white;"></i> Refrescar la página</button></a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/lifting/cargaImagenes.js') }}"></script>
<script type="text/javascript">

    $('#example').DataTable({
        serverSide: true,
        ajax: "../../levantamiento/jq/listadoDeImagenes/" + {{ $id }},
        columns: [
            {data: 'btn'}
        ],
        pageLength : 3,
        bLengthChange: false,
        searching: true,
        "order": [[ 0, "desc" ]],
        info: false
    });


</script>
@endsection

