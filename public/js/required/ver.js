$(document).ready( function(){

    $('#costos').numeric(",");
    $('#precio_p').numeric(",");

    $('#modificarMontos').on('click', function(){
        var des = $('#descripcion').val();
        var cos =$('#costos').val();
        if (cos.length < 1 || des.length < 1) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              })

              Toast.fire({
                icon: 'danger',
                title: 'Los campos de costos o el resultado <br>de la evaluación no deben de quedar vacios.'
              })

            return false;
        }

        var asigId = $("#modificarMontos").val();
        var id = asigId.split('-');
        var ruta3 = "../../precios/jq/cambiar-precios/4r5t67y8" + id[0] +"/"+ id[1];
            $.ajax({
                url: ruta3,
                data:{'costos': cos},
                type: "get",
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            })
            .done(function(comp) {
                if (comp == true) {
                    $('button').attr("disabled", true);
                    document.location.href = '../../asignacion?msj=joss';
                } else {
                    alert("Algo esta fallando");
                }
            })
            .fail( function(){
                console.log("fallo el ajax");

            });

    });

    $('#cargarMontos').on('click', function(){
        var des = $('#descripcion').val();
        var cos =$('#costos').val();
        if (cos.length < 1 || des.length < 1) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              })

              Toast.fire({
                icon: 'danger',
                title: 'Los campos de costos o el resultado <br>de la evaluación no deben de quedar vacios.'
              })

            return false;
        }

        var asigId = $("#cargarMontos").val();
        var id = asigId.split('-');
        var ruta3 = "../../precios/jq/cargar-precios/4r5t67y8" + id[0] +"/"+ id[1];
            $.ajax({
                url: ruta3,
                data:{'costos': cos},
                type: "get",
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            })
            .done(function(comp) {
                if (comp == true) {
                    $('button').attr("disabled", true);
                    document.location.href = '../../asignacion?msj=yves';
                } else {
                    alert("Algo esta fallando");
                }
            })
            .fail( function(){
                console.log("fallo el ajas");

            });



    });




    $("#enviar").on('click', function(){

        var ruta_txt = "../../requerimiento/jq/modificar-precio";
            $.ajax({
                url: ruta_txt,
                data:{'nombre': $("#nombre_p").val(), 'metrica': $("#metrica").val(), 'precio_p': $("#precio_p").val(),'levantamiento': $("#levantamiento").val()},
                type: "post",
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            })
            .done(function(comp) {

                $('#example').DataTable().ajax.reload();
                $('#nombre_p').val("");
                $('#metrica').val("");
                $('#precio_p').val("");

            })
            .fail( function(){
                console.log("fallo el ajax en envio");

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
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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


    $(document).on('click', '#modificandoMaterial', function(){

            $.ajax({
                url: "../../requerimiento/js/modificar/listado",
                type: "post",
                dataType: "json",
                data: { id: $(this).val() },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        .done(function(comp) {
            $('#nombre_p').val(comp['nombre_producto']);
            $('#metrica').val(comp['metrica']);
            $('#precio_p').val(comp['cantidad']);
            $('#identificador').val(comp['id']);
            $('#modificar').removeAttr('disabled');

        })
        .fail( function(){
            console.log("fallo el ajax");
        });
    });

    $(document).on('click', '#modificar', function(){

        $.ajax({
            header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "../../requerimiento/jq/cargar-request",
            dataType: "json",
            type: "post",
            data: {id: $('#identificador').val(), producto: $('#nombre_p').val(), metrica: $('#metrica').val(), cantidad: $('#precio_p').val()},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        .done(function(comp) {
            $('#example').DataTable().ajax.reload();
            $('#nombre_p').val("");
            $('#metrica').val("");
            $('#precio_p').val("");
            $('#identificador').val("");
            $('#modificar').attr('disabled', true);
        })
        .fail( function(){
            console.log("fallo el ajax");
        });

    });




});
