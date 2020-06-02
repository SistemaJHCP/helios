    <a href="{{ route("operador.consultar",$id) }}"><button title="Ver el fólio" id="ver" class="btn btn-primary fa fa-sticky-note"></button></a>
    <a href="{{ route("operador.editar",$id) }}"><button title="Modificar el folio seleccionado" id="modificar" class="btn btn-primary fa fa-edit"></button></a>
    @if($disponibilidad == "disponible")
        <button title="Eliminar este fólio" id="eliminar" class="btn btn-danger fa fa-trash" value="{{ $id }}"></button>
    @else
        <button title="Botón deshabilitado" class="btn btn-danger fa fa-trash" disabled></button>
    @endif
