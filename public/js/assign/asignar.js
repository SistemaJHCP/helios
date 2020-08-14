listado();

function listado(){
    $('#example').DataTable({
        "serverSide":true,
        "ajax": '../asignacion/jquery/listadooperador',
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
