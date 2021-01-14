function listado(){
    $('#example').DataTable({
        "serverSide":true,
        "ajax": '../asignacion/jquery/en-ejecucion-de-obra',
        "columns": [
            {data: 'correctivo'},
            {data: 'sintoma'},
            {data: 'disponibilidad'},
            {data: 'btn'}
        ],
        bLengthChange: false,
        order: [ 0, "desc" ],
        searching: true,
        info: false
    });
}

function listaCoordinador(){
    // $('#example').DataTable({
    //     "serverSide":true,
    //     "ajax": '../asignacion/jquery/revision-de-obra',
    //     "columns": [
    //         {data: 'correctivo'},
    //         {data: 'sintoma'},
    //         {data: 'disponibilidad'},
    //         {data: 'btn'}
    //     ]
    //     "bLengthChange": false,
    //     "order": [[ 0, "desc" ]],
    //     "searching": true,
    //     "info": false
    // });
}
