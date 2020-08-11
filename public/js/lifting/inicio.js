$(document).ready( function(){

    setInterval(function(){
        $('#example').DataTable().ajax.reload();
    },15000);

    var rutaPrincipal = 'levantamiento/jq/listado/index';
    inicio(rutaPrincipal);

    function inicio(ruta){
        $('#example').DataTable({
            destroy: true,
            serverSide:true,
            ajax: ruta,
            columns: [
                {data: 'correctivo'},
                {data: 'sintoma'},
                {data: 'disponibilidad'},
                {data: 'btn'}
            ],
            bLengthChange: false,
            searching: true,
            info: false
        });
    }

    $(document).on("click", "#solicitarCierre", function(){
        Swal.fire({
            title: '¿Estas seguro',
            text: "de querer cerrar este caso",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, caso cerrado',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {

                var id = $(this).val();
                $.ajax({
                    header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "levantamiento/jq/culminar/" + id,
                    dataType: "json",
                    type: "GET"
                })
                .done(function(comp) {
                    $('#example').DataTable().ajax.reload();
                    Swal.fire(
                        'Se ha cerrado el caso!',
                        'queda a la esperadel analisis del <br> coordinador para cerrar el caso.',
                        'success'
                      );
                })
                .fail( function(){
                    Swal.fire(
                        'No tiene autorizacion',
                        'para cerrar este caso',
                        'error'
                      );
                });
            }
        })
    });

    $("#culminados").on('click', function(){
        inicio('levantamiento/jquery/culminados');
    });

    $("#ejecucion").on('click', function(){
        inicio('levantamiento/jquery/ejecutandose');
    });

    $("#enEspera").on('click', function(){
        inicio('levantamiento/jquery/en-espera');
    });

    $("#cerraLider").on('click', function(){
        inicio('levantamiento/jquery/cerrado-por-lider');
    });

    $("#cancelado").on('click', function(){
        inicio('levantamiento/jquery/cancelados');
    });

    $("#todos").on('click', function(){
        inicio('levantamiento/jq/listado/index');
    });

    $("#asignacion").on('click', function(){
        inicio('levantamiento/jq/jquery/asignacion');
    });

    $("#esperandoA").on('click', function(){
        inicio('levantamiento/jquery/esperando-apro');
    });

});






