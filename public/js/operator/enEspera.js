$(document).ready(function(){

    $('#example').DataTable({
        serverSide:true,
        processing: true,
        ajax: 'http://192.168.1.150/helios/public/operador/jquery/enEspera',
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
        ajax: 'http://192.168.1.150/helios/public/operador/jquery/casiCulminado',
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
