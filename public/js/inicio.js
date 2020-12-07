$(document).ready( function(){

    $.ajax({

        url: "inicio/listadoEspecial",
        type: 'GET',
        dataType: 'json',
        header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    .done(function(comp) {

        $("#proyectosTotales").html(comp[0]);
        $("#asignado").html(comp[1] + " / " + comp[0]);
        $("#porAsig").css({'width':comp[2]});
        $("#cancelado").html(comp[3] + " / " + comp[0]);
        $("#porCan").css({'width':comp[4]});
    })
    .fail( function(){
        console.log("fallo el ajax");
    })





});


