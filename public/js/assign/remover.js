$(document).on("click", "#elim", function(){

    Swal.fire({
        title: '¿Esta usted seguro de eliminar esta imagen?',
        text: "Esta opción es irreversible",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {

            var captura = $(this).val();
            var desglozar = captura.split('asr34');

            $.ajax({

                url: "http://192.168.1.150/helios/public/asignacion/jq/eliminarImagen/"+ desglozar[0] +"/"+desglozar[1],
                type: 'GET',
                dataType: 'json',
                header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            })
            .done(function(comp) {
                $(".modal-body").load(" .modal-body");
                $(".carousel-inner").load(" .carousel-inner");

                Swal.fire(
                    'La imagen',
                    'ha sido borrada.',
                    'success'
                  )
            })
            .fail( function(){
                console.log("fallo el ajax");
            });


        }
      })






});
