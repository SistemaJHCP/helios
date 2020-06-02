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
                <h4 class="title" id="myModalLabel">Políticas y permisos asignados <a href="{{ route('politicas.inicio') }}" class="btn btn-primary"style="float:right;">Regresar</a></h4>
                <form action="{{ route('politicas.modificando',$permisos->id) }}" method="POST">
                    @csrf
                    <table class="table table-condensed">
                            <tr>
                                <td><b>Nombre:</b></td><td colspan="2"><input type="text" name="nombre_politica" id="nombre_politica" autocomplete="off" class="form-control" required="required" maxlength="50" placeholder="Mín 3, Máx 50 caracteres..." value="{{ $permisos->nombre_permisos }}"></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align: center;">
                                    <input class="form-check-input" name="operador" type="checkbox" value="1" id="operador" <?php ($permisos->operador == true) ? print('checked'): print('') ?>>
                                    Operador</td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="ope_cargar" type="checkbox" value="1" id="ope_cargar"  <?php ($permisos->ope_create == true) ? print('checked'): print('') ?>> <b>Cargar solicitudess </b></td>
                                <td><input class="form-check-input" name="ope_modificar" type="checkbox" value="1" id="ope_modificar"   <?php ($permisos->ope_update == true) ? print('checked'): print('') ?>><b> Modificar las solicitudes</b></td>
                                <td><input class="form-check-input" name="ope_imprimir" type="checkbox" value="1" id="ope_imprimir"  <?php ($permisos->ope_print == true) ? print('checked'): print('') ?>><b> Imprimir documentos</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="ope_consultar" type="checkbox" value="1" id="ope_consultar"  <?php ($permisos->ope_read == true) ? print('checked'): print('') ?> > <b>Consultar las solicitudes </b></td>
                                <td><input class="form-check-input" name="ope_eliminar" type="checkbox" value="1" id="ope_eliminar"   <?php ($permisos->ope_delete == true) ? print('checked'): print('') ?>> <b>Eliminar la solicitud</b></td>
                                <td><input class="form-check-input" type="checkbox" name="ope_cerrar" value="1" id="ope_cerrar"  <?php ($permisos->ope_close == true) ? print('checked'): print('') ?>>  <b>Cerrar casos</b></td>
                            </tr>

                            <tr>
                                <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align: center;"><input class="form-check-input" name="coordinador" type="checkbox" value="1" id="coordinador" <?php ($permisos->coordinador == true) ? print('checked'): print('') ?>> Coordinador de obras</td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="coord_seleccionar" type="checkbox" value="1" id="coord_cargar"  <?php $permisos->coord_selection == true ? print('checked'): print('') ?>>  <b>Seleccionar cuadrilla </b></td>
                                <td><input class="form-check-input" name="coord_modificar" type="checkbox" value="1" id="coord_modificar"  <?php ($permisos->coord_update == true) ? print('checked'): print('') ?>>  <b>Modificar las solicitudes</b></td>
                                <td><input class="form-check-input" name="coord_imprimir" type="checkbox" value="1" id="coord_imprimir"  <?php ($permisos->coord_print == true) ? print('checked'): print('') ?>>  <b>Imprimir documentos</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="coord_consultar" type="checkbox" value="1" id="coord_consultar"  <?php ($permisos->coord_consult == true) ? print('checked'): print('') ?>>  <b>Consultar las solicitudes </b></td>
                                <td><input class="form-check-input" name="coord_enviar" type="checkbox" value="1" id="coord_enviar"  <?php ($permisos->coord_send == true) ? print('checked'): print('') ?>>  <b>Enviar solicitud</b></td>
                                <td><input class="form-check-input" name="coord_recibir_folios" type="checkbox" value="1" id="coord_recibir_folios"  <?php ($permisos->coord_asignacion == true) ? print('checked'): print('') ?>>  <b>Recibir folios asignados</b></td>
                            </tr>

                            <tr>
                                <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align: center;"><input class="form-check-input" name="cuadrilla" type="checkbox" value="1" id="cuadrilla" <?php ($permisos->cuadrilla == true) ? print('checked'): print('') ?>> Líder de cuadrilla</td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="cua_cargar" type="checkbox" value="1" id="cua_cargar"  <?php $permisos->cua_create == true ? print('checked'): print('') ?>>  <b>Cargar avances </b></td>
                                <td><input class="form-check-input" name="cua_modificar" type="checkbox" value="1" id="cua_modificar"  <?php ($permisos->cua_update == true) ? print('checked'): print('') ?>>  <b>Modificar las solicitudes</b></td>
                                <td><input class="form-check-input" name="cua_imprimir" type="checkbox" value="1" id="cua_imprimir"  <?php ($permisos->cua_print == true) ? print('checked'): print('') ?>>  <b>Imprimir documentos</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="cua_consultar" type="checkbox" value="1" id="cua_consultar"  <?php ($permisos->cua_read == true) ? print('checked'): print('') ?>>  <b>Consultar las solicitudes </b></td>
                                <td><input class="form-check-input" name="cua_eliminar" type="checkbox" value="1" id="cua_eliminar"  <?php ($permisos->cua_delete == true) ? print('checked'): print('') ?>>  <b>Eliminar la solicitud </b></td>
                                <td><input class="form-check-input" type="checkbox" name="cua_fin" value="1" id="cua_finish"  <?php ($permisos->cua_finish == true) ? print('checked'): print('') ?>>  <b>Finalizar servicio</b></td>
                            </tr>

                            <tr>
                                <td colspan="3" style="background:#3c8dbc; margin-top:16px; color:white;text-align: center;"> <input class="form-check-input" name="configuracion" type="checkbox" value="1" id="configuracion" <?php ($permisos->configuracion == true) ? print('checked'): print('') ?>>Configuración general</td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="conf_crear" type="checkbox" value="1" id="conf_crear"  <?php $permisos->conf_create == true ? print('checked'): print('') ?>>  <b>Crear usuarios </b></td>
                                <td><input class="form-check-input" name="conf_acceso_pre" type="checkbox" value="1" id="conf_acceso_pre"  <?php ($permisos->conf_access_pre == true) ? print('checked'): print('') ?>>  <b>Acceso al preciario</b></td>
                                <td><input class="form-check-input" name="conf_hab_pol" type="checkbox" value="1" id="conf_hab_pol"  <?php ($permisos->conf_hab_pol == true) ? print('checked'): print('') ?>>  <b>Habilitar politicas</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="conf_modificar" type="checkbox" value="1" id="conf_modificar"  <?php ($permisos->conf_modify == true) ? print('checked'): print('') ?>>  <b>Modificar usuarios </b></td>
                                <td><input class="form-check-input" name="conf_cargar_pre" type="checkbox" value="1" id="conf_cargar_pre"  <?php ($permisos->conf_charge_pre == true) ? print('checked'): print('') ?>>  <b>Cargar en el preciario</b></td>
                                <td><input class="form-check-input" name="conf_cons_pol" type="checkbox" value="1" id="conf_cons_pol"  <?php ($permisos->conf_con_pol == true) ? print('checked'): print('') ?>>  <b>Consultar las políticas</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="conf_rehabilitar" type="checkbox" value="1" id="conf_rehabilitar"  <?php ($permisos->conf_rehability == true) ? print('checked'): print('') ?>>  <b>Rehabilitar usuarios </b></td>
                                <td><input class="form-check-input" name="conf_mod_pre" type="checkbox" value="1" id="conf_mod_pre"  <?php ($permisos->conf_modify_pre == true) ? print('checked'): print('') ?>>  <b>Modificar precios</b></td>
                                <td><input class="form-check-input" type="checkbox" name="conf_mod_pol" value="1" id="conf_mod_pol"  <?php ($permisos->conf_mod_pol == true) ? print('checked'): print('') ?>>  <b>Modificar políticas</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="conf_deshabilitar" type="checkbox" value="1" id="conf_deshabilitar"  <?php ($permisos->conf_deshability == true) ? print('checked'): print('') ?>>  <b>Deshabilitar usuarios </b></td>
                                <td><input class="form-check-input" name="conf_elim_pre" type="checkbox" value="1" id="conf_elim_pre"  <?php ($permisos->conf_del_pre == true) ? print('checked'): print('') ?>>  <b>Eliminar productos</b></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" name="conf_master" type="checkbox" value="1" id="conf_master"  <?php ($permisos->conf_marterk == true) ? print('checked'): print('') ?>>  <b>Cambiar llave maestra </b></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center;"><input type="submit" class="btn btn-primary" value="Modificar las políticas"></td>
                            </tr>
                    </table>
                    <input type="hidden" id="id_1" value="{{ $permisos->id }}">
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 connectedSortable">

    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('js/politics/modify.js') }}"></script>
<script>





</script>
@endsection
