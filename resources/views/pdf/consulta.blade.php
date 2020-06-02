<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>

    * {padding: 3px; background-image: url('imagenes/iconos/transperencia-prueba.png'); font: 14px sans-serif;}
    .min {font-size:10px; font-weight: bold;}


    .correctivo {width: 180px; height: 44px; border: 1px solid black; float:left;padding-top: 4px;text-align: center}
    .titulo {width: 300px; height: 44px; border: 1px solid black; float: left;padding-top: 4px;}
    .logo {width: 180px; height: 44px; border: 1px solid black; float: left;padding-top: 4px;}
    img {width: 160px; height: 40px; margin-top: -3px;}

    .cintillo1 {width: 676px; height: 16px; border: 1px solid #007996; background: #007996; padding-top: 2px; color:white;margin-top: 10px;text-align: center}

    .orden {width: 298px; height: 60px; border: 1px solid black; float:left;padding: 4px; margin-top: 20px;}
    .fecha {width: 178px; height: 60px; border: 1px solid black; float: left;padding: 4px;}
    .fecha_fin {width: 178px; height: 60px; border: 1px solid black; float: left;padding: 4px;}

    .sintoma {width: 454px; height: 64px; border: 1px solid black;padding: 4px; margin-top: 70px;}
    .siniestro {width: 100px; height: 64px; border: 1px solid black;padding: 4px; float: left; margin-left: 464px; margin-top: -74px;}
    .prioridad {width: 100px; height: 64px; border: 1px solid black; padding: 4px; float: left;}

    .cintillo2 {width: 676px; height: 16px; border: 1px solid #007996; background: #007996; padding-top: 2px; color:white;margin-top: 100px;text-align: center}

    .motivo {width: 674px; height: 44px; border: 1px solid black;padding: 4px; margin-top: 20px;}
    .descripcion {width: 674px; height: 92px; border: 1px solid black;padding: 4px;}

    .cintillo3 {width: 676px; height: 16px; border: 1px solid #007996; background: #007996; padding-top: 2px; color:white;margin-top: 20px;text-align: center}

    .usuario {width: 334px; height: 44px; border: 1px solid black;padding: 4px; margin-top: 20px;}
    .telefono {width: 160px; height: 44px; border: 1px solid black;padding: 4px; float: left; margin-left: 344px; margin-top: -74px;}
    .oficina {width: 160px; height: 44px; border: 1px solid black; padding: 4px; float: left;}
    .utecnica {width: 480px; height: 60px; border: 1px solid black;padding: 4px;margin-top: 53px;}
    .planta-bbva {width: 185px; height: 60px; border: 1px solid black;padding: 4px;float:left;margin-top: -70px;margin-left: 489px;}
    .inmueble {width: 220px; height: 56px; border: 1px solid black;padding: 4px;margin-top:69px;}
    .ceco {width: 180px; height: 56px; border: 1px solid black;padding: 4px;margin-left: 229px;margin-top: -66px;float: left;}
    .coord-bbva {width: 255px; height: 56px; border: 1px solid black;padding: 4px; float: left;}
    .emplazamiento {width: 674px; height: 44px; border: 1px solid black;padding: 4px;margin-top: 65px;}

    .cintillo4 {width: 676px; height: 16px; border: 1px solid #007996; background: #007996; padding-top: 2px; color:white;margin-top: 20px;text-align: center}

    .opera {width: 218px; height: 44px; border: 1px solid black; padding: 4px; margin-top: 20px;}
    .cord {width: 218px; height: 44px; border: 1px solid black; padding: 4px; float: left;margin-left: 228px; margin-top:-60px;}
    .lidr {width: 218px; height: 44px; border: 1px solid black; padding: 4px; float: left;}

            /**
            * Set the margins of the PDF to 0
            * so the background image will cover the entire page.
            **/
            @page {
                margin: 0cm 0cm;
            }

            /**
            * Define the real margins of the content of your PDF
            * Here you will fix the margins of the header and footer
            * Of your background image.
            **/
            body {
                margin-top:    3.5cm;
                margin-bottom: 1cm;
                margin-left:   1cm;
                margin-right:  1cm;
            }

            /**
            * Define the width, height, margins and position of the watermark.
            **/
            #centrarCabecera {
                position: fixed;
                bottom:   0px;
                left:     40px;
                /** The width and height may change
                    according to the dimensions of your letterhead
                **/
                width:    21.8cm;
                height:   28cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }


            #watermark {
                position: fixed;

                /**
                    Set a position in the page for your image
                    This should center it vertically
                **/
                bottom:   14cm;
                left:     7cm;

                /** Change image dimensions**/
                width:    6cm;
                height:   5cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }

            /* indicamos el salto de pagina */
            .saltoDePagina{
                page-break-after: always;
            }


/* ------------------------------------------------------------------------------------------------------- */


</style>
<body>

    <div id="watermark">
        <img src="{{ url('imagenes/iconos/logo600x600.png') }}" style="width:400px; height:400px;margin-left:-60px;" />
    </div>

    <div id="centrarCabecera">

            <div class="correctivo"><b>Correctivo: </b><br>{{ $operador[0]->correctivo }}</div>
            <div class="titulo"><center><b>Informe sobre folios</b><br>del BBVA</center></div>
            <div class="logo"><center><img src="{{ url('imagenes/logo-mini.png') }}" alt=""></center></div>

    </div>
    <div class="cuerpo">


        <div class="cintillo1">ORDEN</div>

        <div class="orden"><div class="min">Orden: </div>{{ $operador[0]->orden }}</div>
        <div class="fecha"><div class="min">Fecha de inicio: </div>{{ $operador[0]->fecha }}</div>
        <div class="fecha_fin"><div class="min">Fecha final: </div>{{ $operador[0]->fecha_fin }}</div>

        <div class="sintoma"><div class="min">Sintoma: </div>{{ $operador[0]->orden }}</div>
        <div class="siniestro"><div class="min">Siniestro: </div>{{ $operador[0]->siniestro }}</div>
        <div class="prioridad"><div class="min">Prioridad: </div>{{ $operador[0]->prioridad }}</div>

        <div class="cintillo2">DETALLE</div>

        <div class="motivo"><div class="min">Motivo de la orden: </div>{{ $operador[0]->motivo }}</div>
        <div class="descripcion"><div class="min">Descripción: </div>{{ $operador[0]->descripcion }}</div>

        <div class="cintillo3">UBICACION</div>

        <div class="usuario"><div class="min">Usuario: </div>{{ $operador[0]->usuario }}</div>
        <div class="telefono"><div class="min">Teléfono: </div>{{ $operador[0]->telefono }}</div>
        <div class="oficina"><div class="min">Oficina: </div>{{ $operador[0]->oficina }}</div>
        <div class="utecnica"><div class="min">Ubicación técnica: </div>{{ $operador[0]->u_tecnica }}</div>
        <div class="planta-bbva"><div class="min">planta: </div>{{ $operador[0]->planta }}</div>
        <div class="inmueble"><div class="min">Inmueble: </div>{{ $operador[0]->inmueble }}</div>
        <div class="ceco"><div class="min">CECO: </div>{{ $operador[0]->ceco }}</div>
        <div class="coord-bbva"><div class="min">Coordinador BBVA: </div>{{ $operador[0]->coordinador_bbva }}</div>
        <div class="emplazamiento"><div class="min">Emplazamiento: </div>{{ $operador[0]->emplazamiento }}</div>

        <div class="cintillo4">ASIGNACION DE COORDINADOR JHCP</div>

        <div class="opera"><div class="min">Operador: </div>{{ $ope->name }} {{ $ope->lastname }}</div>
        <div class="cord"><div class="min">Coordinador: </div>{{ $ope->name }} {{ $ope->lastname }}</div>
        <div class="lidr"><div class="min">Lider de cuadrilla: </div>{{ $ope->name }} {{ $ope->lastname }}</div>

    </div>
        <div style="display:none;display:block;page-break-before:always;"></div>

    <style>
        /* table {border: 1px solid #000;border-collapse: collapse;}
        th, td {width: 25%;text-align: left;vertical-align: top;border: 1px solid #000;}
        .tabla {width: 350px} */
        .opciones {width: 674px; height: 160px;}
        .resultadoEvaluacion {width: 668px; height: 134px; text-align: justify}
        .cintillo5 {width: 676px; height: 16px; border: 1px solid blue; background: blue; padding-top: 2px; color:white;text-align: center}
        .cintillo6 {width: 676px; height: 16px; border: 1px solid blue; background: blue; padding-top: 2px; color:white;text-align: center; margin-bottom: 20px;}
        .costosTotales {width: 120px; height: 140px; float:left; margin-top: 20px; border: 1px solid black;}
        .resultadoNegativo {width: 540px; height: 140px;;float:left;text-align: justify; border: 1px solid black;}
        .cintillo7 {width: 676px; height: 16px; border: 1px solid blue; background: blue;margin-top:210px; padding-top: 2px; color:white;text-align: center; margin-bottom: 20px; margin-bottom: 20px;}
        .tabla {width: 674px; height: 160px;}

        table {
            width: 100%;
            border: 1px solid #000;
        }
        th, td {
            width: 100%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
        }


    </style>

    <div class="2daHoja">
        <div class="opciones">
            <div class="cintillo5">RESULTADO DE LA EVALUACION</div>
            <div class="resultadoEvaluacion"><b></b>{{ $levan->descripcion }}</div>
            <div class="cintillo6">COSTO DEL SERVICIO Y RESULTADO DE LA EVALUACION</div>
            <div class="costosTotales"><b>COSTOS: </b><br>{{ $precio->costo }}</div>
            <div class="resultadoNegativo"><b>RESULTADO DE LA EVALUACION: </b><br> {{ $observacion->observacion }} </div>


            </div>
            <div class="cintillo7">REQUERIMIENTOSS DE MATERIALES</div>
            <div class="tabla">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Medida</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reque as $r)
                        <tr>
                            <td> {{ $r->nombre_producto }} </td>
                            <td>{{ $r->metrica }}</td>
                            <td>{{ $r->cantidad }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>




    <script type="text/php">
        if ( isset($pdf) ) {
            // OLD
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} de {PAGE_COUNT}", $font, 6, array(0,0,0));
            // v.0.7.0 and greater
            $x = 500;
            $y = 800;
            $text = "{PAGE_NUM} de {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>


</body>
</html>
