<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inicio', 'HomeController@index')->name('home');



Route::group(['prefix' => 'politicas', 'middleware' => 'auth'],function() {

    Route::get('/','politicasController@index')->name('politicas.inicio');
    Route::get('/ver/blas527{id}292w5rregu-w8sg8w','politicasController@show')->name('politicas.ver')->where('id', '[0-9]+');
    Route::get('/modificar/blas{id}7h3ffy8y67hftgu7dx','politicasController@edit')->name('politicas.modificar')->where('id', '[0-9]+');
    Route::post('modificando/{id}','politicasController@update')->name('politicas.modificando')->where('id', '[0-9]+');
    Route::post('cargando','politicasController@store')->name('politicas.cargar');
    Route::get('/','politicasController@index')->name('politicas.inicio');
    Route::get('/eliminando/d332ddew{id}gh5hg3d6hjj','politicasController@deshabilitar')->name('politicas.eliminar')->where('id', '[0-9]+');

    //------------ jquery politicas -----------------
    Route::get('jq_permisos/{id}','politicasController@jq_cargar_permisos');

});

Route::group(['prefix' => 'usuarios', 'middleware' => 'auth'],function() {

    Route::get('/','usuarioController@index')->name('usuario.index');
    Route::post('guardar','usuarioController@store')->name('usuario.guardar');
    Route::get('consultar/hii9ja9ac{id}hcjoa9cag$u8siqs=78htsnc_ux' ,'usuarioController@show')->name('usuario.mostrar');
    Route::get('modificar/hiec2323fcc{id}hcecwec/wcew6cx/6' ,'usuarioController@edit')->name('usuario.editar');
    Route::post('actualizando/hccoh9gt7gxw{id}7tuscscy8sc7ochgscu' ,'usuarioController@update')->name('usuario.actualizar');
    Route::get('eliminar/hicc3cec433e2d{id}hced326cx/3d2f' ,'usuarioController@disabled')->name('usuario.eliminar');
    Route::get('activar/hicc3cec433e2d{id}hced326cx/3d2f' ,'usuarioController@recovery')->name('usuario.recuperar');
    Route::get('borrarDefinitivamente/hicc3cec433e2d{id}hced326cx/3d2f' ,'usuarioController@destroy')->name('usuario.borrar');

    //------------ jquery usuario -----------------
    Route::get('correo/{correo}','usuarioController@jqcorreo')->name('usuario.jsCorreo');
    Route::get('/jquery/listadousuario','usuarioController@jq_usuario')->name('jquery.usuario.listado');


});

Route::group(['prefix' => 'operador', 'middleware' => 'auth'],function() {

    Route::get('/','operadorController@index')->name('operador.index');
    Route::post('/cargando','operadorController@store')->name('operador.cargar');
    Route::get('consultar/87sxyhjnhu8s7yjsngts5rsdfy765rgu89okjy6trdfgt{id}y7s8isjhgfssjksuy78siuygshji87tsuisjyts','operadorController@show')->name('operador.consultar');
    Route::get('modificar/iuhjkjio9iuioki543we{id}rdse54r6789oiu765resdrt78ol,mn876bvcxdr54esdfvb9ihkmjiuy7t3yuijknmjiuyutwghw8wtug','operadorController@edit')->name('operador.editar');
    Route::post('modificando/cwecwewc333334f5ggtg66h8jhygh8u98j7we{id}rdse54r6789oiu765resdrt78gd87gdeh8enb7ege9gd0ebedd8ge8hde','operadorController@update')->name('operador.actualiza');
    Route::get('eliminar/{id}','operadorController@destroy')->name('operador.eliminar');
    Route::get('folios-en-espera','operadorController@foliosEnEspera')->name('operador.folioEnEspera');
    Route::get('folios-cerrado-coordinador','operadorController@foliosCierreCoord')->name('operador.aproCoord');
    Route::get('analisis-general/9udr5gd9dh8td9uddu98uyghj65rty4rtyhbvcdscvbjk9d{id}od0u9y8uydhvdd','operadorController@analisisValores')->name('operador.analisisValores');
    Route::get('analisis-cierre/9udr5gd9dh8td9uddu98uyghj65rty4rtyhbvcdscvbjk9d{id}od0u9y8uydhvdd','operadorController@analisisCierre')->name('operador.analisisCierre');
    Route::get('jquery/finalizarCaso/{id}','operadorController@jq_finalizar');
    Route::get('jquery/imprimir/{id}','operadorController@jq_imprimirCierre');
    Route::post('aprobar-ejecucion/29{id}','operadorController@aprobarEjecucion')->name('operador.aprobarEjecucion');
    Route::post('eliminar-ejecucion/29{id}','operadorController@eliminarEjecucion')->name('operador.eliminarEjecucion');
    Route::get('galeria-de-imagenes/asd354fefvdsdhv7hfgfdxwt2gff4rwzdvnntbrf9vdcsax8sdwa42eracs3543x456a{id}asaevtbyn57','operadorController@galeriaOperador')->name('operador.galeriaOperador');

    //-----------------  pdf  ------------------------------

    Route::get('/informe-de-negativa/ygy8u7t6yguhijop0u9y8t7f6x{id}yerctjop0u9vybu','operadorController@informeNegativa')->name('operador.informeNegativa');
    Route::get('/informe-de-aprobado/yg63094h7wji429iw2{id}5su8unimiubh2hjkmh89juhusb6wu','operadorController@informeCulminada')->name('operador.informeAprobatoria');
    Route::get('/consultarpdf/yg63094h7wji429iw2{id}5su8unimiubh2hjkmh89juhusb6wu','operadorController@consultaPdf')->name('operador.consultaPdf');

    //------------ jquery operador -----------------
    Route::get('/jquery/listadooperador','operadorController@jq_lista')->name('jquery.operador.listado');
    Route::get('/jquery/enEspera','operadorController@jq_enEspera')->name('jquery.operador.jq_enEspera');
    Route::get('/jquery/casiCulminado','operadorController@jq_casiCulmi')->name('jquery.operador.jq_casiCulminado');
    // Route::get('/jquery/lista-de-materiales/1087{d}', 'operadorController@jq_listaMateriales');


// base de las rutas: Route::get()->name();
});

Route::group(['prefix' => 'configuracion_general', 'middleware' => 'auth'],function() {

    Route::get('/','generalController@index')->name('general.index');
    Route::post('modificar/bu9xg79bxusxb9{id}bsx9bxsx9','generalController@modificar')->name('general.modificar');

// base de las rutas: Route::get()->name();
});

Route::group(['prefix' => 'asignacion', 'middleware' => 'auth'],function() {

    Route::get('/','asignacionController@index')->name('asignacion.index');
    Route::get('/listado','asignacionController@mostrar')->name('asignacion.mostrar');
    Route::get('/mostrar-asignacion/dd0ssjs8sksjs6tts42293h363bgygbhnjmkloijuhygvcfvbu9u8huyg{id}vtgbhnj','asignacionController@mostrarAsignacion')->name('asignacion.mostrarAsignacion');
    Route::get('/folio/87g9gx9xyaxsxbs79xasxg97sx9saxg7gas9xyiabsxusa9xg7asxasg9xa7sx8sxxag79gx9xyaxsxbs79xasxg97sx9saxg7gas9xyiabsxusa9xg7asxasg9xa7sx8asg9xasxg9a7xsyxasg9{id}sx7gsgax7saxs','asignacionController@show')->name('asignacion.ver');
    Route::post('/procesar/{id}','asignacionController@procesando')->name('asignacion.crear');
    Route::get('/mostrar/ohsu9xsipxs78iuytfg287i2jn2t2uy73687989308yguh{id}x90osix','asignacionController@edit')->name('asingacion.cambiar');
    Route::post('/modificando/8cdyd7tdc99dchdc8dfc67dc89dcngdc7gdc9cd8{id}7d6cthdcdc8g7','asignacionController@update')->name('asignacion.modificando');
    Route::get('culminados-por-cuadrillas', 'asignacionController@culminadosCuadrilla')->name('asignacion.culminadosCuadrilla');
    Route::get('/jq/listadoDeImagenes/{id}','asignacionController@jq_listadoDeImagen');
    Route::get('/jq/lista/borrar-imagen', 'asignacionController@borrarImagen');
    Route::get('/jq/eliminarImagen/{id_imagen}/{id_seguimiento}','asignacionController@borrarImagen');

    Route::get('/jquery/en-ejecucion-de-obra', 'asignacionController@enEjecucion')->name('asignacion.en-ejecucion');
    Route::get('/jq/datoslider/{id}','asignacionController@identificar')->name('asignacion.identificar');
    Route::get('/jquery/listadooperador','asignacionController@jq_lista')->name('jquery.asignacion.listado');
    Route::get('/jquery/waiting','asignacionController@esperando');
    Route::get('/jquery/listado','asignacionController@listadoCulminado');
    Route::get('/jquery/finlizar/{id}','asignacionController@finalizarCoord');
    Route::get('/jquery/reactivando/{id}','asignacionController@reactivando')->name('asignacion.reactivando');
    Route::get('consultar-caso/gbe3hnjkwln4bgbhnj3mkrtyhujiuy4gtfcvwbhj5eduh3ywtfrdew6{id}dfgyytwrd5sfghuyt', 'asignacionController@consulCaso')->name('asignacion.consulCaso');
    Route::get('/esperando-aprobacion','asignacionController@esperaAprobacion')->name('asignacion.esperaAprobacion');
    Route::get('consultar/87sxyhjnhu8s7yjsngts5rsdfy765rgu89okjy6trdfgt{id}y7s8isjhgfssjksuy78siuygshji87tsuisjyts','asignacionController@consulta')->name('asignacion.consultar');
    Route::get('/caso-imagenes/ctyiuijigy{id}656rtryf7y89uiohuvtcrt', 'asignacionController@consultarHistorialImagenes')->name('asignacion.casoImagenes');
    Route::get('consultar-caso/7yutghiuygyfguyo8t76r6t7y{id}8ugy7t897fuyguy89t78r65e64xrdfgyut', 'asignacionController@casosEnEjecucion')->name('asignacion.verCasoEjecucion');
});

Route::group(['prefix' => 'levantamiento', 'middleware' => 'auth'],function() {

    Route::get('/', 'levantamientoController@index')->name('levantamiento.index');
    Route::get('/jq/listado/index', 'levantamientoController@jqIndexMini')->name('levantamiento.jq.index');
    Route::get('/cargar/78t7d7csd7t9dct97dgcbdcft5d45etdsxe35e4r5t6u7{id}iy8u9ohudicy', 'levantamientoController@create')->name('levantamiento.cargar');
    Route::post('/cargando/buns{id}op3pi4o6s7b8x', 'levantamientoController@store')->name('levantamiento.cargando');
    Route::get('/editar/78t7d7csd7t9dct97dgcbdcft5d45etdsxe35e4r5t6u7{id}iy8u9ohudicy', 'levantamientoController@edit')->name('levantamiento.modificar');
    Route::get('/modificando/buns{id}op3pi4o6s7b8x', 'levantamientoController@asignandoMateriales')->name('levantamiento.asignandoMateriales');
    Route::post('/cargarndoResultado/ih8{id}yusxas8yoix','levantamientoController@cambiandoResultado')->name('levantamiento.cambiandoResultado');
    Route::get('/cambio/8ubcd8hb54461yt1jv{id}2f3gu2gf862ti', 'levantamientoController@cambiar')->name('levantamiento.cambiarEstado');
    Route::get('/jquery/culminados', 'levantamientoController@culminados');
    Route::get('/jquery/esperando-apro', 'levantamientoController@levApro');
    Route::get('/jquery/ejecutandose', 'levantamientoController@ejecucion');
    Route::get('/jquery/en-espera', 'levantamientoController@espera');
    Route::get('/jquery/cerrado-por-lider', 'levantamientoController@cerradoLider');
    Route::get('/jquery/cancelados', 'levantamientoController@cancelados');
    Route::get('/jq/jquery/asignacion', 'levantamientoController@asignacion');
    Route::get('cargandoimagenes/s18yuhs98suhnjsuhi9s87y{id}09898uyghbvfdrf','levantamientoController@vistaCargaImagenes')->name("levantamiento.vistaCargaImagenes");
    Route::post('cargandoimagenes/s8yuhs98suhnjsuhi9s87y{id}x{id_seguimiento}09898uyghbvfdrf','levantamientoController@modCargaImagenes')->name("levantamiento.modCargaImagenes");
    Route::post('carga-de-imagenes/s8yuhs98suhnjsuhi9s87y{id}09898uyghbvfdrf','levantamientoController@cargaImagenes')->name('levantamiento.cargaImagenes');
    Route::get('/jq/listadoDeImagenes/{id}','levantamientoController@jq_listadoDeImagen');
    Route::get('/caso-imagenes/ctyiuijigy{id}656rtryf7y89uiohuvtcrt', 'levantamientoController@consultarHistorialImagenes')->name('levantamiento.casoImagenes');
    Route::get('/jq/culminar/{id}','levantamientoController@jq_culminarCaso');
    Route::get('/prueba','levantamientoController@intento');
    // Route::post('jq/modificar-dato','levantamientoController@jq_modUno');

    //------ jquery ajax -----------------
    Route::get('/jq/seguimientoTexto/{id}', 'levantamientoController@jsGuardarSeguimiento');


});

Route::group(['prefix' => 'requerimiento', 'middleware' => 'auth'],function() {

    Route::get('jq/lista-de-requerimientos/{id}','requerimientoController@jq_cargar_productos');
    Route::post('/jq/modificar-precio', 'requerimientoController@jq_precios');
    Route::get('/borrar/listado/{id}','requerimientoController@destroy')->name('requerimiento.eliminar');
    Route::post('/js/modificar/listado/','requerimientoController@edit')->name('requerimiento.modificar');
    Route::post('/jq/cargar-request', 'requerimientoController@update');
    Route::get('/jquery/listadoSimple/{id}', 'requerimientoController@jq_general');
    Route::post('jq/modificar-un-material', 'requerimientoController@jq_modUno');
});

Route::group(['prefix' => 'precios', 'middleware' => 'auth'],function() {

    Route::get('jq/cargar-precios/4r5t67y8{id}/{id2}','preciosController@cargarPrecios');
    Route::get('jq/cambiar-precios/4r5t67y8{id}/{id2}','preciosController@cambiarPrecios');

});

Route::group(['prefix' => 'mail', 'middleware' => 'auth'],function() {

    Route::get('correo/','asignacionController@correo')->name('asignacion.correo');

});
