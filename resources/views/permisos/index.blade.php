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
    <li><i class="glyphicon glyphicon-ban-circle"> </i> Políticas y permisos <div class="glyphicon glyphicon-menu-left"></div>  Configuración  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">

    <div class="col-lg-7 col-md-7 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div class="nav nav-tabs pull-right">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Crear un nivel de acceso
                </button>

                    <table id="example" class="table table-condensed table-striped table-bordered" id="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Id</th>
                                    <th style="text-align: center;">Nombre de la política</th>
                                    <th style="text-align: center;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permisos as $per)
                                    <tr>
                                        <td style="text-align: center;">{{ $per->id }}</td>
                                        <td>{{ $per->nombre_permisos }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('politicas.ver',$per->id) }}"><button title="Ver las políticas" id="ver" class="btn btn-primary glyphicon glyphicon-list-alt"></button></a>
                                            <a href="{{ route('politicas.modificar',$per->id) }}"><button title="Modificar políticas" id="modificar" class="btn btn-primary glyphicon glyphicon-edit"></button></a>
                                            <a href="{{ route('politicas.eliminar',$per->id) }}" id="eliminar"><button title="Modificar políticas" id="valor" class="btn btn-danger glyphicon glyphicon-trash" value="{{ $per->id }}"></button></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre de la política</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                        </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-5 hidden-xs hidden-sm connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <div class="nav nav-tabs pull-right">
                <img src="{{ url('imagenes/sistemas/permisos.jpg') }}" class="img-responsive">
                <!--Photo by Desola Lanre-Ologun on Unsplash-->
            </div>
        </div>
    </div>
</div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Creación de políticas</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('politicas.cargar') }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="nombre_politica">Indique el nombre del nivel de acceso</label>
                                <input type="text" name="nombre_politica" id="nombre_politica" autocomplete="off" class="form-control" required="required" maxlength="50" placeholder="Mín 3, Máx 50 caracteres...">

                                <!---- cliente inicio ---->

                                <div class="row">
                                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px;">
                                        <center>
                                                <input class="form-check-input" name="operador" type="checkbox" value="1" id="operador">
                                                <label class="form-check-label" style="color:white;">
                                                  Operador
                                                </label>
                                        </center>
                                    </div>
                                    <div class="col-md-4" style="margin-top:16px;">
                                        <div class="form-check">
                                            <input class="form-check-input" name="ope_cargar" type="checkbox" value="1" id="ope_cargar" disabled>
                                            <label class="form-check-label" for="defaultCheck1">
                                              Cargar solicitudes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="ope_consultar" type="checkbox" value="1" id="ope_consultar" disabled>
                                            <label class="form-check-label" for="defaultCheck1">
                                              Consultar solicitudes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-top:16px;">
                                        <div class="form-check">
                                            <input class="form-check-input" name="ope_modificar" type="checkbox" value="1" id="ope_modificar" disabled>
                                            <label class="form-check-label" for="defaultCheck1">
                                              Modificar solicitudes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="ope_eliminar" type="checkbox" value="1" id="ope_eliminar" disabled>
                                            <label class="form-check-label" for="defaultCheck1">
                                              Eliminar la solicitud
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-top:16px;">
                                        <div class="form-check">
                                            <input class="form-check-input" name="ope_permiso" type="checkbox" value="1" id="ope_imprimir" disabled>
                                            <label class="form-check-label" for="defaultCheck1">
                                              Esperando aprobación
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ope_cerrar" value="1" id="ope_cerrar" disabled>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Finiquitar casos
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!---- coordinador inicio ---->
                                <div class="row">
                                        <div class="col-md-12" style="background:#3c8dbc; margin-top:16px;">
                                            <center>
                                                <input class="form-check-input" name="coordinador" type="checkbox" value="1" id="coordinador">
                                                <label class="form-check-label" style="color:white;">
                                                        Coordinador de la obra
                                                </label>
                                            </center>
                                        </div>
                                        <div class="col-md-4" style="margin-top:16px;">
                                            <div class="form-check"> <!-- listo -->
                                                <input class="form-check-input" name="coord_seleccionar" type="checkbox" value="1" id="coord_cargar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Consultar lista de fólios
                                                </label>
                                            </div>
                                            <div class="form-check"><!-- listo -->
                                                <input class="form-check-input" name="coord_consultar" type="checkbox" value="1" id="coord_consultar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Espera de aprobación
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-4" style="margin-top:16px;">
                                            <div class="form-check">
                                                <input class="form-check-input" name="coord_modificar" type="checkbox" value="1" id="coord_modificar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Asignar un fólio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="coord_enviar" type="checkbox" value="1" id="coord_enviar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Modificar asignacion
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="margin-top:16px;">
                                            <div class="form-check">
                                                <input class="form-check-input" name="coord_imprimir" type="checkbox" value="1" id="coord_imprimir" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Culminados por lider
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="coord_recibir_folios" type="checkbox" value="1" id="coord_recibir_folios" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    proyectos cancelados
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--- Lider de cuadrilla ---->
                                    <div class="row">
                                            <div class="col-md-12" style="background:#3c8dbc; margin-top:16px;">
                                                <center>
                                                    <input class="form-check-input" name="cuadrilla" type="checkbox" value="1" id="cuadrilla">
                                                    <label class="form-check-label" style="color:white;">
                                                        Lider de cuadrilla
                                                    </label>
                                                </center>
                                            </div>
                                            <div class="col-md-4" style="margin-top:16px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="cua_cargar" type="checkbox" value="1" id="cua_cargar" disabled>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Evaluación preliminar
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="cua_consultar" type="checkbox" value="1" id="cua_consultar" disabled>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                      Carga de materiales
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top:16px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="cua_modificar" type="checkbox" value="1" id="cua_modificar" disabled>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                      Agregar productos
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="cua_eliminar" type="checkbox" value="1" id="cua_eliminar" disabled>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                      Eliminar la solicitud
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top:16px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="cua_imprimir" type="checkbox" value="1" id="cua_imprimir" disabled>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                      Culminar casos
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="cua_fin" value="1" id="cua_fin" disabled>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                            ------------
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <!---- General ---->
                                    <div class="row">
                                        <div class="col-md-12" style="background:#3c8dbc; margin-top:16px;">
                                            <center>
                                                    <input class="form-check-input" name="configuracion" type="checkbox" value="1" id="configuracion">
                                                    <label class="form-check-label" style="color:white;">
                                                            Configuracion general
                                                    </label>
                                            </center>
                                        </div>
                                        <div class="col-md-4" style="margin-top:16px;">
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_crear" type="checkbox" value="1" id="conf_crear" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Crear usuarios
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_modificar" type="checkbox" value="1" id="conf_modificar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Modificar usuarios
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_rehabilitar" type="checkbox" value="1" id="conf_rehabilitar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Rehabilitar usuarios
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_deshabilitar" type="checkbox" value="1" id="conf_deshabilitar" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Deshabilitar usuarios
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_master" type="checkbox" value="1" id="conf_master" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Cambiar llave maestra
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="margin-top:16px;">

                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_acceso_pre" type="checkbox" value="1" id="conf_acceso_pre" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Acceso al preciario
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_cargar_pre" type="checkbox" value="1" id="conf_cargar_pre" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Cargar en el preciario
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_mod_pre" type="checkbox" value="1" id="conf_mod_pre" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Modificar precios
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_elim_pre" type="checkbox" value="1" id="conf_elim_pre" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Eliminar productos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="margin-top:16px;">
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_hab_pol" type="checkbox" value="1" id="conf_hab_pol" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Habilitar políticas
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="conf_cons_pol" type="checkbox" value="1" id="conf_cons_pol" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                  Consultar las políticas
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="conf_mod_pol" value="1" id="conf_mod_pol" disabled>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Modificar políticas
                                                </label>
                                            </div>
                                        </div>
                                    </div>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <input type="submit" id="envio" class="btn btn-primary" value="Crear política" disabled></input>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

                <!------ Fin dek modal ---->
@endsection
@section('js')

<script src="{{ asset('plugins/datatables.net/js/datatables.min.js') }}"></script>
<script src="{{ asset('js/politics/inicio.js') }}"></script>
<script>





</script>
@endsection
