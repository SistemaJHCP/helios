$(document).ready(function(){

    $('#example').DataTable({
        serverSide:true,
        processing: true,
        ajax: '../operador/jquery/enEspera',
        columns: [
            {data: 'correctivo'},
            {data: 'sintoma'},
            {data: 'disponibilidad'},
            {data: 'btn'}
        ],
        bLengthChange: false,
        searching: true,
        info: false
    });

    $('#casiCulminado').DataTable({
        serverSide:true,
        processing: true,
        ajax: '../operador/jquery/casiCulminado',
        columns: [
            {data: 'correctivo'},
            {data: 'sintoma'},
            {data: 'disponibilidad'},
            {data: 'btn'}
        ],
        bLengthChange: false,
        searching: true,
        info: false
    });


});
