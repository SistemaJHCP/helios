$(document).ready(function(){

    $("#aprov").on("click", function(){
        var obs = $("#observacion").val();
        if (obs.length <1) {
            Swal.fire(
                'Este campo',
                'no puede estar vacio',
                'warning'
              )
            return false;
        }
    });

    $("#reprov").on("click", function(){
        var obs = $("#observacionRep").val();
        console.log(obs);
        if (obs.length <1) {
            Swal.fire(
                'Este campo',
                'no puedes estar vacio',
                'warning'
              )
            return false;
        }
    });


});
