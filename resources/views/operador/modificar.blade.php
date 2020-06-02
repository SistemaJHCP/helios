@extends('layouts.template')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('mini-cabecera')
<h1>
    Modificar los datos
    <small>del folio</small>
</h1>
<ol class="breadcrumb">
    <li><i class="fa fa-folder-o"> </i> Modificar <div class="glyphicon glyphicon-menu-left"></div>  Operador  </li>
</ol>
<hr>
@endsection

@section('body')
<div class="row">
    <div class="col-lg-2 col-md-2">

    </div>
    <div class="col-lg-8 col-md-8 connectedSortable">
        <div class="nav-tabs-custom" style="margin-left:15px;margin-right:18px;padding:18px;">
            <form action="{{ route('operador.actualiza',$folio->id) }}" method="post">
                @csrf
            <div class="form-group">
                <div class="form-group">
                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                        <center>
                            <label class="form-check-label" style="color:white;">
                                ORDEN
                            </label>
                        </center>
                    </div>
                    <label for="correctivo" style="margin-top:10px;">Correctivo</label>
                    <input type="text" disabled name="correctivo" id="correctivo" pattern="[0-9]+" class="form-control" pattern="[0-9]+" placeholder="Solo se permiten números" maxlength="11" value="{{ $folio->correctivo }}" required>

                    <label for="orden" style="margin-top:10px;">Tipo de orden</label>

                    <input type="text" name="orden" id="orden" class="form-control" maxlength="50" required placeholder="Indique el orden" value="{{ $folio->orden }}">



                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha de apertura</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="fecha" class="form-control pull-right" id="fecha" placeholder="mm/dd/aaaa" required readonly value="{{ $folio->fecha }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Fecha de cierre</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="fecha_fin" class="form-control pull-right" id="fecha2" placeholder="mm/dd/aaaa" required readonly value="{{ $folio->fecha_fin }}">
                                </div>
                            </div>
                        </div>

                    <label for="sintoma" style="margin-top:10px;">Sintoma</label>
                    <input type="text" name="sintoma" id="sintoma" class="form-control" maxlength="50" required placeholder="Indique el motivo dela creación del folio" value="{{ $folio->sintoma }}">

                    <label for="prioridad" style="margin-top:10px;">Prioridad</label>
                    <select name="prioridad" id="prioridad" class="form-control" required placeholder="Indique el motivo dela creación del folio">
                        <option value="">Seleccione...</option>
                        <option value="normal" <?php ($folio->prioridad == 'normal') ? print('selected'): print('') ?>>Normal</option>
                        <option value="urgente" <?php ($folio->prioridad == 'urgente') ? print('selected'): print('') ?>>Urgente</option>
                    </select>


                    <label for="siniestro" style="margin-top:10px;">Siniestro</label>
                    <select name="siniestro" id="siniestro" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="si" <?php ($folio->siniestro == 'si') ? print('selected'): print('') ?>>Si</option>
                        <option value="no" <?php ($folio->siniestro == 'no') ? print('selected'): print('') ?>>No</option>
                    </select>





                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                        <center>
                            <label class="form-check-label" style="color:white;">
                                DETALLE
                            </label>
                        </center>
                    </div>

                    <label for="motivo" style="margin-top:10px;">Motivo de la orden</label>
                    <input type="text" name="motivo" id="motivo" class="form-control" maxlength="50" required placeholder="Título de la orden"  value="{{ $folio->motivo }}">

                    <label for="descripcion" style="margin-top:10px;">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" maxlength="240" required placeholder="Breve descripción del problema">{{ $folio->descripcion }}</textarea>

                    <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                        <center>
                            <label class="form-check-label" style="color:white;">
                                UBICACION
                            </label>
                        </center>
                    </div>

                    <label for="usuario" style="margin-top:10px;">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" maxlength="50" required placeholder="Ingrese el ID del usuario" value="{{ $folio->usuario }}">

                    <div class="form-group">
                            <label>Teléfono</label>

                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                              </div>
                              <input type="text" name="telefono" id="telefono" class="form-control" maxlength="12" required placeholder="Ingrese el telefono del usuario" value="{{ $folio->telefono }}">
                            </div>


                    <label for="u_tecnica" style="margin-top:10px;">Ubicación técnica</label>
                    <input type="text" name="u_tecnica" id="u_tecnica" class="form-control" maxlength="100" required placeholder="Ingrese los datos de la ubicación técnica" value="{{ $folio->u_tecnica }}">

                    <label for="inmueble" style="margin-top:10px;">Inmueble</label>
                    <input type="text" name="inmueble" id="inmueble" class="form-control" maxlength="50" required placeholder="Ingrese el inmueble" value="{{ $folio->inmueble }}">

                    <label for="planta" style="margin-top:10px;">Planta</label>
                    <input type="text" name="planta" id="planta" class="form-control" maxlength="50" required placeholder="Indique la planta" value="{{ $folio->planta }}">

                    <label for="oficina" style="margin-top:10px;">Oficina</label>
                    <input type="text" name="oficina" id="oficina" class="form-control" maxlength="18" required placeholder="Indique el código de la oficina" value="{{ $folio->oficina }}">

                    <label for="ceco" style="margin-top:10px;">CECO</label>
                    <input type="text" name="ceco" id="ceco" class="form-control" maxlength="50" required placeholder="Ingrese el CECO" value="{{ $folio->ceco }}">

                    <label for="coordinador-bbva" style="margin-top:10px;">Coordinador-bbva</label>
                    <input type="text" name="coordinador_bbva" id="coordinador-bbva" class="form-control" maxlength="50" required placeholder="Ingrese el coordinador por parte de BBVA" value="{{ $folio->coordinador_bbva }}">

                    <label for="motivo" style="margin-top:10px;">Emplazamiento</label>
                    <input type="text" name="emplazamiento" id="emplazamiento" class="form-control" maxlength="90" required placeholder="Indique la dirección del emplazamiento" value="{{ $folio->emplazamiento }}">
                </div>
                <div class="col-md-12" style="background:#3c8dbc; margin-top:16px; ">
                <center>
                    <label class="form-check-label" style="color:white;padding-botton:10px;">
                        ASIGNACION DE COORDINADOR JHCP
                    </label>
                </center>
                </div>
                <label for="coordinador_jhcp" style="margin-top:10px;">Seleccione al coordinador a encargarse</label>
                <select name="coordinador_jhcp" id="coordinador_jhcp" class="form-control" style="margin-top:10px;" required>
                    <option value="">Seleccione...</option>
                    @foreach ($coord as $c)
                        <option value="{{ $c->id }}" <?php ($folio->coordinador_jhcp_id == $c->id) ? print('selected'): print('') ?>>{{ $c->name }} {{ $c->lastname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-default">Regresar</button></a>
                <input type="submit" id="envio" class="btn btn-primary" value="Cargar folio">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="col-lg-2 col-md-2">

    </div>
</div>


@endsection
@section('js')
<script src="{{ asset('plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/operator/operadorModificar.js') }}"></script>

<script>
    $('#fecha').datetimepicker({
        format:'dd-mm-yyyy hh:ii',
        showInputs: false
    });

    $('#fecha2').datetimepicker({
        format:'dd-mm-yyyy hh:ii',
        showInputs: false
    });
</script>
@endsection
