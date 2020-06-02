$(document).ready( function(){

    $('#correctivo').change(function(){
        if ($('#correctivo').val() == "") {
            alert("no debe de estar vacio");
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

    $(document).on("blur", "#emplazamiento", function(){
        if ($("#emplazamiento").val() == "") {
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

});

function alerta(){
    Swal.fire({
        type: 'error',
        title: 'No deben de quedar',
        text: 'campos vacios en el formulario',
        timer:4000
    })
}
