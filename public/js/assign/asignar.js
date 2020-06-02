listado();

function listado(){
    $('#example').DataTable({
        "serverSide":true,
        "ajax": 'http://192.168.1.150/helios/public/asignacion/jquery/listadooperador',
        "columns": [
            {data: 'correctivo'},
            {data: 'sintoma'},
            {data: 'disponibilidad'},
            {data: 'btn'}
        ],
        "bLengthChange": false,
        "order": [[ 0, "desc" ]],
        "searching": true,
        "info": false
    });
}
