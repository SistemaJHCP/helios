$(document).ready( function(){

    $('#precio_p').numeric(",");

    $('#cerrar').on('click', function(){
        Swal.fire({
            title: '¿Esta seguro',
            text: "de cerrar el fólio para su evaluación?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, enviar caso!'
          }).then((result) => {
            if (result.value) {
                window.location.href = $('#cerrar').val();
            }
          })
    });




    $("#enviar").on('click', function(){

        var ruta_txt = "http://192.168.1.150/helios/public/requerimiento/jq/modificar-precio";
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

    $(document).on('click', '#modificar', function(){

        $.ajax({
            header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "http://192.168.1.150/helios/public/requerimiento/jq/cargar-request",
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
            $('#modificar').prop('disabled', true);
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
            $('#modificar').prop('disabled', false);

        })
        .fail( function(){
            console.log("fallo el ajax");
        });
    });










    $(document).on('click', "#desecharMaterial", function(){

        Swal.fire({
            title: 'Esta seguro',
            text: "de querer eliminar este material?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {

                var rute = $(this).val();
                $.ajax({
                    url: rute,
                    type: "get",
                    dataType: "json",
                    header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                })
                .done(function(comp) {
                    console.log(comp);
                    $('#example').DataTable().ajax.reload();
                })
                .fail( function(){
                    console.log("fallo el ajax");
                });

            }
          })

    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })

});
