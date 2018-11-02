<?php
// Principal ------------------------------------------------
Route::get('/', 'GuestController@index')->name('inicio');
Route::get('/home', 'WebController@seleccionarModo')->name('home');
Route::get('/praemie', 'WebController@praemie')->name('praemie');
Route::get('/about', 'WebController@about')->name('about');
Route::post('/registro', 'UserController@store')->name('registro');
// Login prueba 2
Route::get('/test', function(){
    return view('test');
});
// Logeo
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::put('/validar','WebController@validar')->name('validar');
// Modo de ingreso
Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function () {
    Route::get('/user/{id}/edit', 'UserController@edit');
    Route::put('/user/{id}/edit', 'UserController@update');
});
//------------------------------------------------------------------
Route::middleware(['session','usuario'])->group(function () {
    // Rutas para usuarios --------------------------------------
    Route::get('/promos','UserController@promos')->name('usuario.promos');
    Route::get('/categorias','UserController@categorias')->name('usuario.categorias');
    Route::get('/puntos','UserController@puntos')->name('usuario.puntos');
    Route::get('/empresas/{s?}','UserController@empresas')->name('usuario.empresas')
        ->where('s', '[a-z]+');
    Route::get('/negocio/{empresa}','UserController@mostrarEmpresa')->name('usuario.empresa');
    Route::get('/mapa','UserController@mapa')->name('usuario.mapa');
    Route::get('/productos/{id}','ProductController@show')->name('usuario.productos');
    Route::get('/notificaciones/usuario','UserController@notificaciones')->name('usuario.notificaciones');
    Route::get('/guardados','UserController@guardados')->name('usuario.guardados');
    Route::get('/loquequieras','UserController@loquequieras')->name('usuario.loquequieras');
    Route::get('/share','UserController@comparteyGana')->name('usuario.share');
    Route::get('/pedidos','UserController@MisPedidos')->name('usuario.pedidos');
    Route::get('/factura/usuario','UserController@factura')->name('usuario.factura');
    Route::get('/favor','UserController@favor')->name('usuario.favor');
    Route::post('/guardados/{id}','UserController@favorito')->name('usuario.favorito');
    Route::post('/guardados/empresa/{id}','UserController@favoritoEmpresa')->name('usuario.favorito_empresa');
    Route::get('/guardados/empresa', function(){return redirect()->route('usuario.promos');});
    Route::get('/productos_carrito','CarritoController@AllProduct')->name('carrito.todos');
    Route::get('/carrito/{id}','CarritoController@agregar')->name('carrito.agregar');
    Route::get('/carrito/{id}/borrar','CarritoController@borrar')->name('carrito.borrar');
    Route::get('/carrito/{id}/incrementar','CarritoController@incrementar')->name('carrito.incrementar');
    Route::get('/carrito/{id}/decrementar','CarritoController@decrementar')->name('carrito.decrementar');
    // Rutas general
    Route::get('/cuenta/usuario','UserController@cuenta')->name('usuario.cuenta');
    Route::get('/switch/usuario','UserController@logout')->name('usuario.switch');
});
Route::middleware(['session','empresa'])->group(function () {
    // Rutas para empresa --------------------------------------
    Route::get('/categoria','BusinessController@inicio')->name('empresa.inicio');
    Route::get('/business/{id}','BusinessController@edit')->name('empresa.edit');
    Route::put('/business/{id}','BusinessController@update')->name('empresa.update');
    Route::get('/business/{id}/codigo','BusinessController@codigo')->name('empresa.codigo');
    Route::delete('/business/{id}/desafiliar','BusinessController@desafiliar')->name('empresa.desafiliar');
    Route::resource('/productos', 'ProductController');
    Route::resource('/ofertas', 'PromosController');
    Route::resource('/boletines', 'BoletinController');
    Route::get('/seguidores', 'BusinessController@seguidores')->name('empresa.seguidores');
    Route::get('/mi_empresa','BusinessController@miempresa')->name('empresa.miempresa');
    Route::get('/producto/{id}','ProductController@show')->name('empresa.productos');
    Route::get('servicios_productos', 'ProductController@AllProduct')->name('productos.todos');
    Route::get('ofertas_promociones', 'PromosController@AllPromos')->name('ofertas.todos');
    Route::get('boletin_todos', 'BoletinController@AllBoletin')->name('boletines.todos');
    Route::get('/empresa/{empresa}','UserController@mostrarEmpresa')->name('empresa.empresa');
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
    Route::get('/saldo', 'AffiliateController@saldo')->name('afiliador.saldo');
    Route::get('/neg/{id}','UserController@mostrarEmpresa')->name('afiliador.empresa');
    Route::get('/notificaciones/afiliador','AffiliateController@notificaciones')->name('afiliador.notificaciones');
    Route::post('/afiliar','AffiliateController@afiliar')->name('afiliador.afiliar');
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
