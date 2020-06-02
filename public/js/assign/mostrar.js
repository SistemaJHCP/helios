$(document).ready( function(){

    $(document).on('change', '#lider', function(){
        var valor = this.value;
        var url = "http://192.168.1.150/helios/public/asignacion/jq/datoslider/" + valor
        if (valor != "") {
            $.ajax({

                url: url,
                type: 'GET',
                dataType: 'json',
                header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            })
            .done(function(comp) {

                $(newFunction("#dv1")).fadeOut();
                $(newFunction("#dv1")).fadeIn();
                console.log(comp);
                $(newFunction("#dv1")).show(function(){
                    $("#id").val(comp[0].id);
                    $("#nombre").html(comp[0].name + ' ' + comp[0].lastname);
                    $("#correo").html(comp[0].email);
                    $("#estado").html(comp[0].estado);
                }).fadeIn();

            })
            .fail( function(){
                console.log("fallo el ajax");
            })
        } else {
            $(newFunction("#dv1")).fadeOut();
        }


    });



});
function newFunction() {
    return "#dv1";
}

