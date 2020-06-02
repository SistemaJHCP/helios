$(document).ready(function(){

    $(document).on("click", "#impPfd", function(){
        Swal.fire({
            title: 'Se esta generando el documento PDF',
            text: 'El tiempo de creación depende de la  cantidad de imágenes tenga el proyecto.',
            imageUrl: img,
            imageWidth: 400,
            imageHeight: 280,
            imageAlt: 'Custom image',
        })
    });


    $(document).on("click", "#finalizar", function(){

        Swal.fire({
            title: 'Desea finiquitar el proyecto?',
            text: "Esta acción no puede ser revertida",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, cerrar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: fin,
                    type: 'GET',
                    dataType: 'json',
                    header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                })
                .done(function(comp) {
                    window.location.href = "http://192.168.1.150/helios/public/operador";
                    Swal.fire(
                        'Se ha culminado el proyecto',
                        'Felicitaciones.',
                        'success'
                    )
                })
                .fail( function(){
                    Swal.fire(
                        'No se pudo culminar la solicitud',
                        'No se ha cambiado el estado del proyecto.',
                        'danger'
                    )
                } )

            }
          })

    });

});
