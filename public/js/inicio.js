$(document).ready( function(){

    $.ajax({

        url: "inicio/listadoEspecial",
        type: 'GET',
        dataType: 'json',
        header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    })
    .done(function(comp) {
        console.log(comp)
        $("#proyectosTotales").html(comp[0]);
        $("#asignado").html(comp[1] + " / " + comp[0]);
        $("#porAsig").css({'width':comp[2]});
        $("#cancelado").html(comp[3] + " / " + comp[0]);
        $("#porCan").css({'width':comp[4]});
        $("#ejecutando").html(comp[5] + " / " + comp[0]);
        $("#porEjec").css({'width':comp[6]});
        $("#esperando").html(comp[7] + " / " + comp[0]);
        $("#porApro").css({'width':comp[8]});
    })
    .fail( function(){
        console.log("fallo el ajax");
    })





});

