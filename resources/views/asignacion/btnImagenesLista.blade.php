<div class="col-md-12">
    <div class="col-md-3">
        <center>
            <a href="{{ route('asignacion.casoImagenes', $id) }}" style="text-decoration: none;"><div class="fa fa-picture-o" style="font-size:60px;margin-top:18px;"></div></a>
            <br>mirar fotos
        </center>
    </div>
    <span class="label pull-right" style="color:#9999aa;">{{ $nombre }}</span>
    <div class="col-md-9" style="text-align:justify;">
        {{ $avance }}
    </div>
</div>
