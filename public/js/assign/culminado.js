$(document).ready( function(){

    $('#listadoCulminados').DataTable({
        serverSide: true,
        ajax: "http://192.168.1.150/helios/public/asignacion/jquery/listado",
        columns: [
            {data:"correctivo"},
            {data:"sintoma"},
            {data: 'btn'}
        ],
        pageLength : 3,
        bLengthChange: false,
        searching: true,
        order: [[ 0, "desc" ]],
        info: false
    });

    $(document).on('click', '#reactivar', function(){

        Swal.fire({
            title: '¿Usted desea reactivar el caso',
            text: "para ser atendido por el lider de cuadrilla?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, reactivar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: "http://192.168.1.150/helios/public/asignacion/jquery/reactivando/" + $(this).val(),
                    type: 'GET',
                    dataType: 'json',
                    header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                })
                .done(function(comp) {
                    if (comp) {
                        $('#listadoCulminados').DataTable().ajax.reload();
                        Swal.fire(
                            'Solicitud procesada',
                            'se le reactivo el caso a<br>su lider de cuadrilla',
                            'success'
                          )
                    }
                })
                .fail( function(){
                    console.log("fallo el ajax");
                })

            }

          })
    });


    $(document).on('click', '#finalizar', function(){

        Swal.fire({
            title: '¿Desea cerrar el caso?',
            text: "la información pasara a manos del Operador",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, enviar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {

                var id = $(this).val();
                $.ajax({
                    url: "http://192.168.1.150/helios/public/asignacion/jquery/finlizar/" + id,
                    type: 'GET',
                    dataType: 'json',
                    header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}

                })
                .done(function(comp) {
                    if (comp) {
                        $('#listadoCulminados').DataTable().ajax.reload();
                        Swal.fire(
                            'Se ha enviado',
                            'el cierre del caso al Operador.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'No se pudo',
                            'Guardar la información.',
                            'error'
                        );
                    }
                })
                .fail( function(){
                    console.log("fallo el ajax");
                })

            }
          })







    });


});
