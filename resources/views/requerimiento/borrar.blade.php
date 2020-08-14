{{-- <div class="btn-group">
    @if ($disponibilidad = "esperando aprobación" )
        <button id="modificandoMaterial" class="btn btn-warning fa fa-edit btn-sm" title="Modificar este material" value="{{ route('requerimiento.modificar',$id) }}"></button>
    @endif
    <button id="desecharMaterial" class="btn btn-danger fa fa-window-close btn-sm" title="Eliminar este material" value="{{ route('requerimiento.eliminar',$id) }}"></button>
</div> --}}

<div class="btn-group">
    @if ($disponibilidad = "esperando aprobación" )
        <button id="modificandoMaterial" class="btn btn-warning fa fa-edit btn-sm" title="Modificar este material" value="{{ $id }}"></button>
    @endif
    <button id="desecharMaterial" class="btn btn-danger fa fa-window-close btn-sm" title="Eliminar este material" value="{{ route('requerimiento.eliminar',$id) }}"></button>
</div>
