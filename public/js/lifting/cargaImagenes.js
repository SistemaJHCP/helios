$(document).ready( function(){

    setInterval(function(){
        $('#example').DataTable().ajax.reload();
    },30000);

    $("#submit").on('click', function(){
        var avance = $("#avance").val();
        var id = $("#id").val();
        if(avance){
            $.ajax({
                header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "../../levantamiento/jq/seguimientoTexto/" + id,
                dataType: "json",
                type: "GET",
                data: {avance: avance}
            })
            .done(function(comp) {
                $("#vis1").hide();
                $("#vis2").show();
                $("#vis3").show();

                $("#id2").attr("value", comp[1]);
                $("#ava").html( comp[2]['avance'] );
                $("#id_texto").html( comp[2]['id'] );
            })
            .fail( function(){
                alert("Por un fallo en el guardar el dato, no se ha podido atender la solicitud");
            });
        } else {
            alert("esta vacio");
        }
    });

});



