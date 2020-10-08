@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">

@endsection
@section('mini-cabecera')
<h1>
    Fólios
    <small>en ejecución</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-folder"></i> Fólios en ejecucion <div class="glyphicon glyphicon-menu-left"></div></i> asignación de casos <div class="glyphicon glyphicon-menu-left"></div>  Coordinador  </li>
</ol>
<hr>
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
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
            <div class="col-md-3">2</div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script type="text/javascript">

    $('#example').DataTable({
        serverSide: true,
        ajax: "../../asignacion/jq/listado-Imagenes/" + {{ $id_ruta }},
        columns: [
            {data: 'btn'}
        ],
        pageLength : 5,
        bLengthChange: false,
        searching: true,
        "order": [[ 0, "desc" ]],
        info: false
    });


</script>
@endsection
