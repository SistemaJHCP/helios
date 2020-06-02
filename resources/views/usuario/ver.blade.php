@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('css/usuario/ver.css') }}">
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
    <div class="col-lg-4 col-md-4 connectedSortable">

            <div class="nav-tabs-custom hidden-xs hidden-sm" style="margin-left:15px;margin-right:18px;padding:18px;">
                <div>
                    <img src="{{ url($usuario->ruta_url) }}" class="img-responsive" id="circle">
                </div>
            </div>
            <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
                <div class="titulo">Datos del usuario</div>
                <table class="table">
                    <tr>
                    <td><b>Nombre: </b></td><td>{{ $usuario->name }} {{ $usuario->lastname }}</td>
                    </tr>
                    <tr>
                        <td><b>Correo: </b></td><td>{{ $usuario->email }}</td>
                    </tr>
                    <tr>
                        <td><b>Nivel de acceso: </b></td><td>{{ $usuario->nombre_permisos }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="linea"><a href="{{ route('usuario.index') }}" class="btn btn-primary">Regresar</a></td>
                    </tr>
                </table>
            </div>
        </div>
    <div class="col-lg-6 col-md-6 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
                <div class="titulo">Politicas de acceso</div>
                <table class="table table-condensed">
                        <tr>
                            <td style="text-align:center;"><b>Nombre:</b></td><td colspan="2" style="text-align:center;">{{ $permisos->nombre_permisos }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align:center;">Operador</td>
                        </tr>
                        <tr>
                            <td> <?php $permisos->ope_create == 1 ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Cargar solicitudes </b></td>
                            <td> <?php ($permisos->ope_update == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar las solicitudes</b></td>
                            <td> <?php ($permisos->ope_print == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Imprimir documentos</b></td>
                        </tr>
                        <tr>
                            <td> <?php ($permisos->ope_read == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Consultar las solicitudes </b></td>
                            <td> <?php ($permisos->ope_delete == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Eliminar la solicitud</b></td>
                            <td> <?php ($permisos->ope_close == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Cerrar casos</b></td>
                        </tr>

                        <tr>
                            <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align:center;">Coordinador de obras</td>
                        </tr>
                        <tr>
                            <td> <?php $permisos->coord_selection == 1 ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Seleccionar cuadrilla </b></td>
                            <td> <?php ($permisos->coord_update == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar las solicitudes</b></td>
                            <td> <?php ($permisos->coord_print == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Imprimir documentos</b></td>
                        </tr>
                        <tr>
                            <td> <?php ($permisos->coord_consult == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Consultar las solicitudes </b></td>
                            <td> <?php ($permisos->coord_send == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Enviar solicitud</b></td>
                        </tr>

                        <tr>
                            <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align:center;">Líder de cuadrilla</td>
                        </tr>
                        <tr>
                            <td> <?php $permisos->cua_create == 1 ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Seleccionar cuadrilla </b></td>
                            <td> <?php ($permisos->cua_update == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar las solicitudes</b></td>
                            <td> <?php ($permisos->cua_print == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Imprimir documentos</b></td>
                        </tr>
                        <tr>
                            <td> <?php ($permisos->cua_read == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Consultar las solicitudes </b></td>
                            <td> <?php ($permisos->cua_delete == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Enviar solicitud</b></td>
                            <td> <?php ($permisos->cua_finish == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Finalizar servicio</b></td>
                        </tr>

                        <tr>
                            <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align:center;">Configuración general</td>
                        </tr>
                        <tr>
                            <td> <?php $permisos->conf_create == 1 ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Crear usuarios </b></td>
                            <td> <?php ($permisos->conf_access_pre == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Acceso al preciario</b></td>
                            <td> <?php ($permisos->conf_hab_pol == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Habilitar politicas</b></td>
                        </tr>
                        <tr>
                            <td> <?php ($permisos->conf_modify == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar usuarios </b></td>
                            <td> <?php ($permisos->conf_charge_pre == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Cargar en el preciario</b></td>
                            <td> <?php ($permisos->conf_con_pol == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Consultar las políticas</b></td>
                        </tr>
                        <tr>
                            <td> <?php ($permisos->conf_rehability == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Rehabilitar usuarios </b></td>
                            <td> <?php ($permisos->conf_modify_pre == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar precios</b></td>
                            <td> <?php ($permisos->conf_mod_pol == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar políticas</b></td>
                        </tr>
                        <tr>
                            <td> <?php ($permisos->conf_deshability == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Deshabilitar usuarios </b></td>
                            <td> <?php ($permisos->conf_del_pre == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Eliminar productos</b></td>
                        </tr>
                    </table>
        </div>
    </div>
    <div class="col-lg-1 col-md-1 connectedSortable">

        </div>
</div>

@endsection
@section('js')
<script src=""></script>
<script>





</script>
@endsection
