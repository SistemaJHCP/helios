@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Opciones
    <small>de usuarios</small>
</h1>
<ol class="breadcrumb">
    <li><i class="glyphicon glyphicon-user"> </i> Opciones de usuarios <div class="glyphicon glyphicon-menu-left"></div>  Configuración  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-1 col-md-1 connectedSortable">

    </div>
    <div class="col-lg-6 col-md-6 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div class="modal-header" style="background: #3c8dbc; color:white;text-align:center;">

                <h4 class="modal-title" id="myModalLabel">Modificar a un usuario</h4>
            </div>
            <form action="{{ route('usuario.actualizar',$mostrar->id) }}" method="post">
                @csrf
                 <div class="form-group">
                    <label for="">Ingrese su nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="50" min="3" required autocomplete="off" value="{{ $mostrar->name }}" placeholder="Los campos no pueden estar vacios">
                    <label for="">Ingrese su apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" maxlength="50" min="3" required autocomplete="off" value="{{ $mostrar->lastname }}" placeholder="Los campos no pueden estar vacios">
                    <label for="">Ingrese su correo electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" maxlength="60" min="3" required autocomplete="off" value="{{ $mostrar->email }}" disabled>
                    <label for="">Seleccione su nivel de acceso</label>
                    <select name="nivel" id="nivel" class="form-control" required autocomplete="off" placeholder="Los campos no pueden estar vacios">
                        <option value="">seleccione...</option>
                    @foreach ($permisos as $p)
                        <option value="{{ $p->id }}" <?= ($p->id == $mostrar->permisos_id) ? 'selected':'';?>>{{ $p->nombre_permisos }}</option>
                    @endforeach()
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('usuario.index') }}"><button type="button" class="btn btn-default">Regresar</button></a>
                    <input type="submit" id="envio" class="btn btn-primary" value="Modificar usuario">
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <img src="{{ url('imagenes/sistemas/crear_usuario.jpg') }}"  class="img-responsive">
        </div>
    </div>
    <div class="col-lg-1 col-md-1 connectedSortable">

    </div>

</div>

@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/users/modificar.js') }}"></script>
<script>





</script>
@endsection
