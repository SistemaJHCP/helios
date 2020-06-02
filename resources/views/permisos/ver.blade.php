@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables.net/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/politics/inicio.css') }}">
@endsection
@section('mini-cabecera')
<h1>
   Políticas
    <small>y permisos</small>
</h1>
<ol class="breadcrumb">
    <li><i class="glyphicon glyphicon-ban-circle"></i> Consultar <div class="glyphicon glyphicon-menu-left"></div>  Políticas y permisos <div class="glyphicon glyphicon-menu-left"></div>  Configuración  </li>
</ol>
<hr>
@endsection
@section('body')
<div class="row">
    <div class="col-lg-2 col-md-2 connectedSortable">

    </div>
    <div class="col-lg-8 col-md-8 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div>
                <h4 class="title" id="myModalLabel">Políticas y permisos asignados <a href="{{ URL::previous() }}" class="btn btn-primary"style="float:right;">Regresar</a></h4>

                <table class="table table-condensed">
                    <tr>
                        <td><b>Nombre:</b></td><td colspan="2">{{ $permisos->nombre_permisos }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align:center;">Operador</td>
                    </tr>
                    <tr>
                        <td> <?php $permisos->ope_create == 1 ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Cargar solicitudes</b></td>
                        <td> <?php ($permisos->ope_update == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Modificar las solicitudes</b></td>
                        <td> <?php ($permisos->ope_permiso == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Esperando aprobación</b></td>
                    </tr>
                    <tr>
                        <td> <?php ($permisos->ope_read == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Consultar las solicitudes </b></td>
                        <td> <?php ($permisos->ope_delete == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Eliminar la solicitud</b></td>
                        <td> <?php ($permisos->ope_cerrar == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Finiquitar casos</b></td>
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
                    <tr>
                        <td> <?php ($permisos->conf_masterk == 1) ? print('<div class="glyphicon glyphicon-ok"></div>'): print('<div class="glyphicon glyphicon-remove"></div>') ?> <b>Cambiar llave maestra  </b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 connectedSortable">

    </div>
</div>

@endsection
@section('js')

<script>





</script>
@endsection
