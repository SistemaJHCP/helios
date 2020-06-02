$(document).ready( function(){

    $("#aprobado").on('click', function(){
        Swal.fire({
            title: '¿Desea aprobar',
            text: "la ejecución de este proyecto por parte de JHCP, C.A?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, aprobado',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
                window.location.href = $("#aprobado").val();
            }
        })
    });


    $("#negado").on('click', function(){
        Swal.fire({
            title: 'No fue aprobada esta solicitud?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'No fue aprobada',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                window.location.href = $("#negado").val();
            }
        })
    });


});
