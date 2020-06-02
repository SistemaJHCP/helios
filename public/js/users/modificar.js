$(document).ready( function(){

    $('#nombre').blur( function(){
        if ($('#nombre').val().length == 0 || $('#nombre').val().length > 50) {
            alerta();
            $('#nombre').css({'border':'1px solid red'});
        } else {
            $('#envio').prop('disabled',false);
            $('#nombre').css({'border':'1px solid #d2d6de'});
        }
    });

    $('#apellido').blur( function(){
        if ($('#apellido').val().length == 0 || $('#apellido').val().length > 50) {
            alerta();
            $('#apellido').css({'border':'1px solid red'});
        } else {
            $('#envio').prop('disabled',false);
            $('#apellido').css({'border':'1px solid #d2d6de'});
        }
    });

    $('#correo').blur( function(){
        if ($('#correo').val().length == 0 || $('#correo').val().length > 50) {
            alerta();
            $('#correo').css({'border':'1px solid red'});
        } else {
            $('#envio').prop('disabled',false);
            $('#correo').css({'border':'1px solid #d2d6de'});
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

});
