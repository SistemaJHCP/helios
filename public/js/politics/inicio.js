
    $('#example').DataTable({
        "bLengthChange": false,
        "searching": true,
        "info": false
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })



    $('#operador').on('click', function(){
        if( $('#operador').prop('checked') ) {
            $('#ope_cargar').prop('disabled', false);
            $('#ope_consultar').prop('disabled', false);
            $('#ope_modificar').prop('disabled', false);
            $('#ope_eliminar').prop('disabled', false);
            $('#ope_imprimir').prop('disabled', false);
            $('#ope_cerrar').prop('disabled', false);
        } else {
            $('#ope_cargar').prop('disabled', true);
            $('#ope_consultar').prop('disabled', true);
            $('#ope_modificar').prop('disabled', true);
            $('#ope_eliminar').prop('disabled', true);
            $('#ope_imprimir').prop('disabled', true);
            $('#ope_cerrar').prop('disabled', true);

            $('#ope_cargar').prop('checked', false);
            $('#ope_consultar').prop('checked', false);
            $('#ope_modificar').prop('checked', false);
            $('#ope_eliminar').prop('checked', false);
            $('#ope_imprimir').prop('checked', false);
            $('#ope_cerrar').prop('checked', false);
        }
    });

    $('#coordinador').on('click', function(){
        if( $('#coordinador').prop('checked') ) {
            $('#coord_recibir_folios').prop('disabled', false);
            $('#coord_cargar').prop('disabled', false);
            $('#coord_consultar').prop('disabled', false);
            $('#coord_modificar').prop('disabled', false);
            $('#coord_enviar').prop('disabled', false);
            $('#coord_eliminar').prop('disabled', false);
            $('#coord_imprimir').prop('disabled', false);
            $('#coord_cerrar').prop('disabled', false);
        } else {
            $('#coord_recibir_folios').prop('disabled', true);
            $('#coord_cargar').prop('disabled', true);
            $('#coord_consultar').prop('disabled', true);
            $('#coord_modificar').prop('disabled', true);
            $('#coord_enviar').prop('disabled', true);
            $('#coord_eliminar').prop('disabled', true);
            $('#coord_imprimir').prop('disabled', true);
            $('#coord_cerrar').prop('disabled', true);

            $('#coord_recibir_folios').prop('checked', false);
            $('#coord_cargar').prop('checked', false);
            $('#coord_consultar').prop('checked', false);
            $('#coord_modificar').prop('checked', false);
            $('#coord_enviar').prop('checked', false);
            $('#coord_eliminar').prop('checked', false);
            $('#coord_imprimir').prop('checked', false);
            $('#coord_cerrar').prop('checked', false);
        }
    });

    $('#cuadrilla').on('click', function(){

        if( $('#cuadrilla').prop('checked') ) {
            $('#cua_cargar').prop('disabled', false);
            $('#cua_consultar').prop('disabled', false);
            $('#cua_modificar').prop('disabled', false);
            $('#cua_eliminar').prop('disabled', false);
            $('#cua_imprimir').prop('disabled', false);
            $('#cua_fin').prop('disabled', false);
        } else {
            $('#cua_cargar').prop('disabled', true);
            $('#cua_consultar').prop('disabled', true);
            $('#cua_modificar').prop('disabled', true);
            $('#cua_eliminar').prop('disabled', true);
            $('#cua_imprimir').prop('disabled', true);
            $('#cua_fin').prop('disabled', true);

            $('#cua_cargar').prop('checked', false);
            $('#cua_consultar').prop('checked', false);
            $('#cua_modificar').prop('checked', false);
            $('#cua_eliminar').prop('checked', false);
            $('#cua_imprimir').prop('checked', false);
            $('#cua_fin').prop('checked', false);
        }
    });

    $('#configuracion').on('click', function(){
        if( $('#configuracion').prop('checked') ) {
            $('#conf_crear').prop('disabled', false);
            $('#conf_modificar').prop('disabled', false);
            $('#conf_rehabilitar').prop('disabled', false);
            $('#conf_deshabilitar').prop('disabled', false);
            $('#conf_acceso_pre').prop('disabled', false);
            $('#conf_cargar_pre').prop('disabled', false);
            $('#conf_mod_pre').prop('disabled', false);
            $('#conf_elim_pre').prop('disabled', false);
            $('#conf_hab_pol').prop('disabled', false);
            $('#conf_cons_pol').prop('disabled', false);
            $('#conf_mod_pol').prop('disabled', false);
            $('#conf_master').prop('disabled', false);
        } else {
            $('#conf_crear').prop('disabled', true);
            $('#conf_modificar').prop('disabled', true);
            $('#conf_rehabilitar').prop('disabled', true);
            $('#conf_deshabilitar').prop('disabled', true);
            $('#conf_acceso_pre').prop('disabled', true);
            $('#conf_cargar_pre').prop('disabled', true);
            $('#conf_mod_pre').prop('disabled', true);
            $('#conf_elim_pre').prop('disabled', true);
            $('#conf_hab_pol').prop('disabled', true);
            $('#conf_cons_pol').prop('disabled', true);
            $('#conf_mod_pol').prop('disabled', true);
            $('#conf_master').prop('disabled', true);

            $('#conf_crear').prop('checked', false);
            $('#conf_modificar').prop('checked', false);
            $('#conf_rehabilitar').prop('checked', false);
            $('#conf_deshabilitar').prop('checked', false);
            $('#conf_acceso_pre').prop('checked', false);
            $('#conf_cargar_pre').prop('checked', false);
            $('#conf_mod_pre').prop('checked', false);
            $('#conf_elim_pre').prop('checked', false);
            $('#conf_hab_pol').prop('checked', false);
            $('#conf_cons_pol').prop('checked', false);
            $('#conf_mod_pol').prop('checked', false);
            $('#conf_master').prop('checked', false);
        }
    });


    $("#nombre_politica").on('blur', function(){
        if ($("#nombre_politica").val().length > 3) {
            $('#envio').prop('disabled', false);

            var nombre = $("#nombre_politica").val();
            var ruta_opciones = "../../politicas/jq_permisos/" + nombre;

            $.ajax({
                url: ruta_opciones,
                type: 'GET',
                dataType: 'json',
                header: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            })
            .done(function(comp) {
                if (comp != 0) {
                    $('#envio').prop('disabled', true);
                    alert("Este nombre ya esta siendo usado, por favor cambiela.");
                }
            })
            .fail( function(){

            } )


        } else {
            $('#envio').prop('disabled', true);
        }
    });

    $("#envio").on('click', function(){

        //-------------------------------  operador  ----------------------------------------
        var operador = [];
        if ($('#ope_cargar').prop('checked') == true ||
            $('#ope_consultar').prop('checked') == true ||
            $('#ope_modificar').prop('checked') == true ||
            $('#ope_eliminar').prop('checked') == true ||
            $('#ope_imprimir').prop('checked') == true ||
            $('#ope_cerrar').prop('checked') == true)
        {
            operador.push("a");
        }

        if (operador.length == 0) {
            $('#operador').prop('checked', false);
            $('#ope_cargar').prop('disabled', true);
            $('#ope_consultar').prop('disabled', true);
            $('#ope_modificar').prop('disabled', true);
            $('#ope_eliminar').prop('disabled', true);
            $('#ope_cerrar').prop('disabled', true);
            $('#ope_imprimir').prop('disabled', true);
        }

        //-------------------------------  coordinador  ----------------------------------------
        var coordinador = [];
        if ($('#coord_cargar').prop('checked') == true ||
         $('#coord_consultar').prop('checked') == true ||
         $('#coord_modificar').prop('checked') == true ||
         $('#coord_enviar').prop('checked') == true ||
         $('#coord_imprimir').prop('checked') == true)
        {
            coordinador.push("a");
        }

        if (coordinador.length == 0) {
            $('#coordinador').prop('checked', false);
            $('#coord_cargar').prop('disabled', true);
            $('#coord_consultar').prop('disabled', true);
            $('#coord_modificar').prop('disabled', true);
            $('#coord_enviar').prop('disabled', true);
            $('#coord_imprimir').prop('disabled', true);
        }

        //-------------------------------  lider  ----------------------------------------
        var lider = [];
        if ($('#cua_cargar').prop('checked') == true ||
         $('#cua_consultar').prop('checked') == true || $('#cua_modificar').prop('checked') == true || $('#cua_eliminar').prop('checked') == true || $('#cua_imprimir').prop('checked') == true || $('#cua_cerrar').prop('checked') == true)
        {
            lider.push("a");
        }

        if (lider.length == 0) {
            $('#cuadrilla').prop('checked', false);
            $('#cua_cargar').prop('disabled', true);
            $('#cua_consultar').prop('disabled', true);
            $('#cua_modificar').prop('disabled', true);
            $('#cua_eliminar').prop('disabled', true);
            $('#cua_imprimir').prop('disabled', true);
            $('#cua_cerrar').prop('disabled', true);
        }

        //-------------------------------  configuracion  ----------------------------------------
        var configuracion = [];
        if ($('#conf_crear').prop('checked') == true || $('#conf_modificar').prop('checked') == true || $('#conf_rehabilitar').prop('checked') == true || $('#conf_deshabilitar').prop('checked') == true || $('#conf_acceso_pre').prop('checked') == true || $('#conf_cargar_pre').prop('checked') == true || $('#conf_mod_pre').prop('checked') == true || $('#conf_elim_pre').prop('checked') == true || $('#conf_hab_pol').prop('checked') == true || $('#conf_cons_pol').prop('checked') == true || $('#conf_mod_pol').prop('checked') == true)
        {
            configuracion.push("a");
        }

        if (configuracion.length == 0) {
            $('#configuracion').prop('checked', false);
            $('#conf_crear').prop('disabled', true);
            $('#conf_modificar').prop('disabled', true);
            $('#conf_rehabilitar').prop('disabled', true);
            $('#conf_deshabilitar').prop('disabled', true);
            $('#conf_acceso_pre').prop('disabled', true);
            $('#conf_cargar_pre').prop('disabled', true);
            $('#conf_mod_pre').prop('disabled', true);
            $('#conf_elim_pre').prop('disabled', true);
            $('#conf_hab_pol').prop('disabled', true);
            $('#conf_cons_pol').prop('disabled', true);
            $('#conf_mod_pol').prop('disabled', true);
        }

        $('#envio').prop('value', 'enviando...');
        $('#envio').prop('disabled', true);
    });


    $(document).on('click', '#eliminar', function(){
        var res = confirm("Esta seguro de querer eliminar esta opción?");
        if (!res) {
            return false;
        }
    });

    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */


        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieChart       = new Chart(pieChartCanvas)
        var PieData        = [
          {
            value    : 700,
            color    : '#f56954',
            highlight: '#f56954',
            label    : 'Chrome'
          },
          {
            value    : 500,
            color    : '#00a65a',
            highlight: '#00a65a',
            label    : 'IE'
          },
          {
            value    : 400,
            color    : '#f39c12',
            highlight: '#f39c12',
            label    : 'FireFox'
          }
        ]
        var pieOptions     = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke    : true,
          //String - The colour of each segment stroke
          segmentStrokeColor   : '#fff',
          //Number - The width of each segment stroke
          segmentStrokeWidth   : 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps       : 100,
          //String - Animation easing effect
          animationEasing      : 'easeOutBounce',
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate        : true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale         : false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive           : true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio  : true,
          //String - A legend template
          legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions)


      });

















