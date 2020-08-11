listado();

function listado(){
    $('#example').DataTable({
        serverSide:true,
        processing: true,
        ajax: 'operador/jquery/listadooperador',
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

$("#correctivo").numeric();

$(document).on("blur", "#correctivo", function(){
    if ($("#correctivo").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#orden", function(){
    if ($("#orden").val() == "") {
        alerta();
    }
});


$(document).on("blur", "#sintoma", function(){
    if ($("#sintoma").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#prioridad", function(){
    if ($("#prioridad").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#siniestro", function(){
    if ($("#siniestro").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#motivo", function(){
    if ($("#motivo").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#descripcion", function(){
    if ($("#descripcion").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#usuario", function(){
    if ($("#usuario").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#telefono", function(){
    if ($("#telefono").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#u_tecnica", function(){
    if ($("#u_tecnica").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#inmueble", function(){
    if ($("#inmueble").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#planta", function(){
    if ($("#planta").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#oficina", function(){
    if ($("#oficina").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#ceco", function(){
    if ($("#ceco").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#coordinador-bbva", function(){
    if ($("#coordinador-bbva").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#motivo", function(){
    if ($("#motivo").val() == "") {
        alerta();
    }
});

$(document).on("blur", "#coordinador_jhcp", function(){
    if ($("#coordinador_jhcp").val() == "") {
        alerta();
    }
});

$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
})

$(document).on('click', '#eliminar', function(){
    Swal.fire({
        title: 'Esta seguro de quere borrar este Folio?',
        text: "Esta acción no puede ser reversada",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {

            var id = this.value;

            $.ajax({
                url: "operador/eliminar/" + id,
                type: 'GET',
                dataType: 'json',
                header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            })
            .done(function(comp) {
                Swal.fire(
                    'Solicitud procesada!',
                    'Se ha borrado el folio correctamente',
                    'success'
                  )
                $('#example').DataTable().ajax.reload();
            })
            .fail( function(){
                console.log("fallo el ajax");
            } )


        } else {
            return false;
        }
      })


});

function alerta(){
    Swal.fire({
        type: 'error',
        title: 'No deben de quedar',
        text: 'campos vacios en el formulario',
        timer:4000
    })
}
