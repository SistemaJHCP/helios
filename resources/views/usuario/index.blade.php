@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/usuario/inicio.css') }}">
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

    <div class="col-lg-4 col-md-4 hidden-xs hidden-sm connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <img src="{{ url('imagenes/sistemas/usuario1.jpg') }}" alt="" class="img-responsive">
        </div>
    </div>
    <div class="col-lg-8 col-md-8 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div class="nav nav-tabs pull-right">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Crear un usuario
                </button>

                @if($usuario->conf_rehability)
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#restablecer">
                        Restablecer usuario
                </button>
                @endif

                    <table id="example" class="table table-condensed table-striped table-bordered" id="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Id</th>
                                    <th style="text-align: center;">Nombre del usuario</th>
                                    <th style="text-align: center;">Estado</th>
                                    <th style="text-align: center;">Acción</th>
                                </tr>
                            </thead>

                            {{-- <tbody>
                                @foreach ( $lista as $l)
                                    <tr>
                                        <td style="text-align: center;">{{ $l->id }}</td>
                                        <td>{{ $l->name }} {{ $l->lastname }}</td>
                                        <td style="text-align: center;">{{ $l->nombre_permisos }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('usuario.mostrar', $l->id) }}"><button class="btn btn-primary btn-xs  glyphicon glyphicon-list-alt"></button></a>
                                            <a href="{{ route('usuario.editar', $l->id) }}"><button class="btn btn-primary btn-xs glyphicon glyphicon-pencil"></button></a>
                                            <a href="{{ route('usuario.eliminar', $l->id) }}"><button id="eliminar" class="btn btn-primary btn-xs  glyphicon glyphicon-trash "></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;">Id</th>
                                    <th style="text-align: center;">Nombre del usuario</th>
                                    <th style="text-align: center;">acceso</th>
                                    <th style="text-align: center;">Acción</th>
                                </tr>
                            </tfoot>
                    </table>
            </div>
        </div>
    </div>

</div>





<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:10px 10px 10px 10px;">
            <div class="modal-header" style="background: #3c8dbc; color:white;border-radius:10px 10px 0px 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Creación de políticas</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('usuario.guardar') }}" method="post" enctype= "multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Ingrese su nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" maxlength="50" min="3" required autocomplete="off" placeholder="">
                        <label for="">Ingrese su apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" maxlength="50" min="3" required autocomplete="off" placeholder="">
                        <label for="">Ingrese su correo electrónico</label>
                        <input type="email" name="correo" id="correo" class="form-control" maxlength="60" min="3" required autocomplete="off" placeholder="">
                        <label for="">Ingrese su contraseña</label>
                        <input type="password" name="clave1" id="clave1" class="form-control" maxlength="50" required autocomplete="off" placeholder="">
                        <label for="">Repita su contraseña</label>
                        <input type="password" name="clave2" id="clave2" class="form-control" maxlength="50" required autocomplete="off" placeholder="">
                        <label for="">Seleccione su nivel de acceso</label>
                        <select name="nivel" id="nivel" class="form-control" required autocomplete="off" placeholder="">
                            <option value="">seleccione...</option>
                        @foreach ($permisos as $p)
                        <option value="{{ $p->id }}">{{ $p->nombre_permisos }}</option>
                        @endforeach()
                        </select>
                        <label for="file">Cargue una imagen</label>
                        <input class="file"  class="form-control" type="file" id="fotografia" name="fotografia"  accept="image/*" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" id="envio" class="btn btn-primary" value="Crear usuario" disabled>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@if($usuario->conf_rehability)
<!----------------------------------------- restablecer -------------------------------------------------->

<div class="modal fade" id="restablecer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:10px 10px 10px 10px;">
            <div class="modal-header" style="background: #3c8dbc; color:white;border-radius:10px 10px 0px 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Restablecer usuarios deshabilitados</h4>
            </div>
            <div class="modal-body">
                <table id="cambio" class="table table-condensed table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Nombre del usuario</th>
                            <th style="text-align: center;">acceso</th>
                            <th style="text-align: center;">Acción</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ( $inactivo as $i)
                            <tr>
                                <td style="text-align: center;">{{ $i->id }}</td>
                                <td>{{ $i->name }} {{ $i->lastname }}</td>
                                <td style="text-align: center;">{{ $i->nombre_permisos }}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('usuario.recuperar', $i->id) }}"><button class="btn btn-primary btn-xs glyphicon glyphicon-ok" title="restablecer a un usuario"></button></a>
                                    <a href="{{ route('usuario.borrar', $i->id) }}"><button id="eliminarTotal" class="btn btn-danger btn-xs glyphicon glyphicon-remove" title="eliminar definitivamente a un usuario"></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Nombre del usuario</th>
                            <th style="text-align: center;">acceso</th>
                            <th style="text-align: center;">Acción</th>
                        </tr>
                    </tfoot>
            </table>
            </div>
        </div>

    </div>
</div>

@endif

@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/users/crear.js') }}"></script>
<script>





</script>
@endsection
