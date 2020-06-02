


    @if($disponibilidad == 'ejecutando')
        <a href="{!! route('levantamiento.cargar', $id) !!}"><button title="Analizar el folio" id="ver" class="btn btn-primary glyphicon glyphicon-list-alt"></button></a>
        <button title="Analizar el folio" id="solicitarCierre" class="btn btn-warning glyphicon glyphicon-send" value="{{ $id }}" style="background:#ff851b;"></button>
    @elseif($disponibilidad == 'cerrado por lider' || $disponibilidad == 'culminado' || $disponibilidad == 'cancelado')
    <button title="esperando evaluacion" id="ver" class="btn btn-primary glyphicon glyphicon-list-alt" disabled></button></a>
    <button title="esperando evaluacion" id="solicitarCierre" class="btn btn-warning glyphicon glyphicon-send" style="background:#ff851b;" disabled></button>
    @else
        <a href="{!! route('levantamiento.cargar', $id) !!}"><button title="Analizar el folio" id="ver" class="btn btn-primary glyphicon glyphicon-list-alt"></button></a>
        <button title="Analizar el folio" id="solicitarCierre" class="btn btn-warning glyphicon glyphicon-send" style="background:#ff851b;" disabled></button>
     @endif

