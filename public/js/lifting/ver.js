$(document).ready( function(){

    $("#eliminar").on('click', function(){
        alert("te veo");
    });

    $('#precio_p').numeric(",");

    $("#enviar").on('click', function(){

        var ruta_txt = "requerimiento/jq/modificar-precio";
            $.ajax({
                url: ruta_txt,
                data:{'nombre': $("#nombre_p").val(), 'metrica': $("#metrica").val(), 'precio_p': $("#precio_p").val(),'levantamiento': $("#levantamiento").val()},
                type: "get",
                dataType: "json",
                header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            })
            .done(function(comp) {
                console.log(comp);
                $('#example').DataTable().ajax.reload();
                $('#nombre_p').val("");
                $('#metrica').val("");
                $('#precio_p').val("");

            })
            .fail( function(){
                console.log("fallo el ajax");

            });

    });



    $(document).on('click', '#modificandoMaterial', function(){
        var rute2 = $(this).val();
        $.ajax({
            url: rute2,
            type: "get",
            dataType: "json",
            header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        .done(function(comp) {
            $('#nombre_p').val(comp['nombre_producto']);
            $('#metrica').val(comp['metrica']);
            $('#precio_p').val(comp['cantidad']);
            $('#identificador').val(comp['id']);

        })
        .fail( function(){
            console.log("fallo el ajax");
        });
    });

    $(document).on('click', '#modificar', function(){

        $.ajax({
            header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "requerimiento/jq/cargar-request",
            dataType: "json",
            type: "get",
            data: {id: $('#identificador').val(), producto: $('#nombre_p').val(), metrica: $('#metrica').val(), cantidad: $('#precio_p').val()}
        })
        .done(function(comp) {
            $('#example').DataTable().ajax.reload();
            $('#nombre_p').val("");
            $('#metrica').val("");
            $('#precio_p').val("");
            $('#identificador').val("");
        })
        .fail( function(){
            console.log("fallo el ajax");
        });

    });



















});
