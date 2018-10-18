<?php
// Principal ------------------------------------------------
Route::get('/', 'WebController@seleccionarModo')->name('home');
Route::get('/home', 'WebController@seleccionarModo')->name('home');
Route::get('/praemie', 'WebController@praemie')->name('praemie');
Route::get('/about', 'WebController@about')->name('about');
// Route::get('/test', function(){
//     return view('mapa');
// });
// Logeo
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// Modo de ingreso
Route::put('/validar','WebController@validar')->name('validar');
//------------------------------------------------------------------
Route::middleware(['session','usuario'])->group(function () {
    // Rutas para usuarios --------------------------------------
    Route::get('/promos','UserController@promos')->name('usuario.promos');
    Route::get('/categorias','UserController@categorias')->name('usuario.categorias');
    Route::get('/puntos','UserController@puntos')->name('usuario.puntos');
    Route::get('/empresas/{s?}','UserController@empresas')->name('usuario.empresas')
        ->where('s', '[a-z]+');
    Route::get('/empresa/{empresa}','UserController@mostrarEmpresa')->name('usuario.empresa');
    Route::get('/mapa','UserController@mapa')->name('usuario.mapa');
    Route::get('/producto/{producto}','ProductController@show')->name('usuario.productos');
    Route::get('/notificaciones/usuario','UserController@notificaciones')->name('usuario.notificaciones');
    Route::get('/guardados','UserController@guardados')->name('usuario.guardados');
    Route::get('/loquequieras','UserController@loquequieras')->name('usuario.loquequieras');
    Route::get('/share','UserController@comparteyGana')->name('usuario.share');
    Route::get('/pedidos','UserController@MisPedidos')->name('usuario.pedidos');
    Route::get('/factura/usuario','UserController@factura')->name('usuario.factura');
    Route::get('/favor','UserController@favor')->name('usuario.favor');
    // Rutas general
    Route::get('/praemie/usuario','UserController@praemie')->name('usuario.praemie');
    Route::get('/about/usuario','UserController@acercade')->name('usuario.about');
    Route::get('/cuenta/usuario','UserController@cuenta')->name('usuario.cuenta');
    Route::get('/switch/usuario','UserController@logout')->name('usuario.switch');

});
Route::middleware(['session','empresa'])->group(function () {
    // Rutas para empresa --------------------------------------
    Route::get('/empresa','BusinessController@inicio')->name('empresa.inicio');

    Route::resource('/productos', 'ProductController');
    Route::resource('/ofertas', 'PromosController');
    Route::resource('/boletines', 'BoletinController');
    Route::get('servicios_productos', 'ProductController@AllProduct')->name('productos.todos');
    Route::get('ofertas_promociones', 'PromosController@AllPromos')->name('ofertas.todos');
    Route::get('boletin_todos', 'BoletinController@AllBoletin')->name('boletines.todos');

    Route::get('/notificaciones/empresa','BusinessController@notificaciones')->name('empresa.notificaciones');
    Route::get('/LanzarBoletin','BusinessController@LanzarBoletin')->name('empresa.LanzarBoletin');
    Route::get('/boletines','BusinessController@boletines')->name('empresa.boletines');
    // Rutas general
    Route::get('/cuenta/empresa','BusinessController@cuenta')->name('empresa.cuenta');
    Route::get('/switch/empresa','BusinessController@logout')->name('empresa.switch');
});
Route::middleware(['session','afiliador'])->group(function () {
    // Rutas para afiliador
    Route::get('/afiliador','AffiliateController@inicio')->name('afiliador.inicio');
    Route::get('/notificaciones/afiliador','AffiliateController@notificaciones')->name('afiliador.notificaciones');
    // Rutas general
    Route::get('/cuenta/afiliador','AffiliateController@cuenta')->name('afiliador.cuenta');
    Route::get('/switch/afiliador','AffiliateController@logout')->name('afiliador.switch');
});
Route::middleware(['session','repartidor'])->group(function () {
    // Rutas para repartidor
    Route::get('/repartidor','DeliverController@inicio')->name('repartidor.inicio');
    Route::get('/notificaciones/repartidor','DeliverController@notificaciones')->name('repartidor.notificaciones');
    // Rutas general
    Route::get('/cuenta/repartidor','DeliverController@cuenta')->name('repartidor.cuenta');
    Route::get('/switch/repartidor','DeliverController@logout')->name('repartidor.switch');
});
