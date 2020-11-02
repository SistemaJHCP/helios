<a href="{{ route('asignacion.consulCaso', $id) }}"><button title="Consultar el caso cerrado" id="ver" class="btn btn-primary fa fa-eye" ></button></a>
<button title="Reactivar caso del lider" id="reactivar" class="btn btn-warning fa fa-chevron-left" value="{{ $id }}"></button>
@if ($disponibilidad == "cerrado por lider")
<button title="Enviar caso a Operador" id="finalizar" class="btn btn-success fa fa-arrow-up" value="{{ $id }}"></button>
@endif
