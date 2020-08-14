
    $('#example').DataTable({

        serverSide:true,
        processing: true,
        ajax: '../asignacion/jquery/waiting',
        columns: [
            {data: 'correctivo'},
            {data: 'sintoma'},
            {data: 'disponibilidad'},
            {data: 'btn'}
        ],
        bLengthChange: false,
        order: [[ 0, "desc" ]],
        searching: true,
        info: false

    });
