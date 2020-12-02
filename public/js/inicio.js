$(document).ready( function(){

    $.ajax({

        url: "inicio/listadoEspecial",
        type: 'GET',
        dataType: 'json',
        header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    .done(function(comp) {

        $("#proyectosTotales").html(comp[0]);
    })
    .fail( function(){
        console.log("fallo el ajax");
    })





});


