$(document).ready( function(){

    $('#example').DataTable({
        "serverSide":true,
        "ajax": 'http://192.168.1.150/helios/public/usuarios/jquery/listadousuario',
        "columns": [
            {data: 'id'},
            {data: 'nombre_completo'},
            {data: 'estado'},
            {data: 'btn'}
        ],
        "bLengthChange": false,
        "searching": true,
        "info": false
    });


    $('#envio').prop('disabled',true);

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

    $('#nombre').blur( function(){
        if ($('#nombre').val().length < 3 || $('#nombre').val().length > 50) {
            alerta();
            $('#nombre').css({'border':'1px solid red'});
        } else {
            $('#envio').prop('disabled',false);
            $('#nombre').css({'border':'1px solid #d2d6de'});
        }
    });

    $('#apellido').blur( function(){
        if ($('#apellido').val().length < 3 || $('#apellido').val().length > 50) {
            alerta();
            $('#apellido').css({'border':'1px solid red'});
        } else {
            $('#envio').prop('disabled',false);
            $('#apellido').css({'border':'1px solid #d2d6de'});
        }
    });

    $('#correo').blur( function(){

        var correo = $("#correo").val();
        var ruta_opciones = "http://192.168.1.150/helios/public/usuarios/correo/" + correo;

        $.ajax({
            url: ruta_opciones,
            type: 'GET',
            dataType: 'json',
            header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        .done(function(comp) {
            if (comp == 1) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                })

                Toast.fire({
                    type: 'warning',
                    title: 'el correo ingresado ya esta en uso'
                })
                $('#envio').prop('disabled',true);
            } else {
                $('#envio').prop('disabled',false);
            }
        })
        .fail( function(){
            console.log("fallo el ajax");
        } )


        if ($('#correo').val().length < 3 || $('#correo').val().length > 50) {
            alerta();
            $('#correo').css({'border':'1px solid red'});
        } else {
            $('#envio').prop('disabled',false);
            $('#correo').css({'border':'1px solid #d2d6de'});
        }
    });

    $('#clave1').blur( function(){
        if ($('#clave1').val().length < 3 || $('#clave1').val().length > 50) {
            alerta();
            $('#clave1').css({'border':'1px solid red'});
        } else {
            $('#clave1').prop('disabled',false);
            $('#clave1').css({'border':'1px solid #d2d6de'});
        }
    });

    $('#clave2').blur( function(){
        if ($('#clave1').val() != $('#clave2').val()) {
            alerta();
            $('#clave1').css({'border':'1px solid red'});
            $('#clave2').css({'border':'1px solid red'});
            $('#envio').prop('disabled',true);//#d2d6de
        } else {
            $('#envio').prop('disabled',false);
            $('#clave1').css({'border':'1px solid #d2d6de'});
            $('#clave2').css({'border':'1px solid #d2d6de'});
        }
    });

    function alerta(){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        })

        Toast.fire({
            type: 'warning',
            title: 'Hay campos con errores'
        })
        $('#envio').prop('disabled',true);
    }

    $(document).on('click', '#eliminar', function(){
        var res = confirm("Esta seguro de querer eliminar esta opción?");
        if (!res) {
            return false;
        }
    });

    $(document).on('click', '#eliminarTotal', function(){
        var res = confirm("Esta opcion es irreversible, se perdera toda la informacion de este usuario, esta realmente seguro???");
        if (!res) {
            return false;
        }
    });


//--------------------------------------------------------------------------------------------------------------

$(document).on('change', 'input[type="file"]', function() {

        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;
        var ext = fileName.split('.').pop();

        if( ext != "png" && ext != "jpg"){
            Swal.fire(
                'No puede cargar este archivo',
                'Solo se permiten formatos de imágen JPEG y PNG para subir a la plataforma!',
                'error'
            )
            return false;
            $('#envio').prop('disabled',true);
        } else {
            $('#envio').prop('disabled',false);
        }

    });

    $("#envio").on('click', function(){
        $('#envio').prop('disabled',true);
    });



});
