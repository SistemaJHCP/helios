@if ($disponibilidad != "disponible")
<a href="{{ route('asignacion.mostrarAsignacion',$id) }}"><button title="Consultar el fólio" id="ver" class="btn btn-primary fa fa-eye" ></button></button></a>
<a href="{{ route('asingacion.cambiar', $id) }}"><button title="Modificar asignación" id="ver" class="btn btn-warning fa fa-exchange"></button></a>
@else
<button title="Aun no puede ver el fólio" id="ver" class="btn btn-primary fa fa-eye" disabled></button>
<a href="{{ route('asignacion.ver',$id) }}"><button title="Asignar el fólio" id="ver" class="btn btn-success fa fa-arrows-h"></button></a>
@endif
