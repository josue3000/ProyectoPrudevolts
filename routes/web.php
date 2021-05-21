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


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // return view('almacen/categoriaMaterial/index');
    return view('auth/login');  //  'auth/login'
 });

// Route::resource('almacen/categoriaMaterial', 'CategoriaMaterialController');
// Route::resource('almacen/material', 'MaterialController');
// Route::resource('ventas/cliente', 'ClienteController');
// Route::resource('compras/proveedor', 'ProveedorController');
// Route::resource('compras/ingreso', 'IngresoController');
// Route::resource('ventas/venta', 'VentaServicioController');
// Route::resource('seguridad/usuario', 'UsuarioController');
// Route::resource('eventos/evento', 'EventoController');
// Route::resource('bancoServicio/categoriaServicio', 'CategoriaServicioController');
// Route::resource('bancoServicio/servicio', 'ServicioController');
// Route::resource('ventas/equipo', 'EquipoController');
 Auth::routes();


Route::get('reporte/{id}','VentaServicioController@imprimir') -> name('venta.pdf');
Route::get('venta.index', 'VentaServicioController@exportExcel') -> name('venta.excel');
Route::get('cliente.index', 'ClienteController@exportExcel') -> name('cliente.excel');
Route::get('equipo.index', 'EquipoController@exportExcel') -> name('equipo.excel');

Route::post('cliente.index', 'ClienteController@importExcel')->name('cliente.import.excel');

//Auth::logout();
//Route::auth();
//Route::get('/', 'ClientController@redirectAuth');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('users/{id}', 'CategoriaMaterialController@show');
// Route::get('/', 'CategoriaMaterialController@saluda');

// Route::get('/', function () {
//     return view('users',['name'=> 'jose']);
//     return view('users')->with('name','Ignacio'); 
// });//


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{slug}','HomeController@index');

// Route::resource('solicitudes/solicitud', 'SolicitudController');
// Route::resource('seguridad/roles', 'RolController');

Route::resource('inicio', 'InicioController');


Route::middleware(['auth'])->group(function () {
    //categoria material
   
    Route::post('almacen/categoriaMaterial/store', 'CategoriaMaterialController@store')->name('categoriaMaterial.store')
                                                        ->middleware('permission:CategoriaMaterial.create');
    Route::get('almacen/categoriaMaterial', 'CategoriaMaterialController@index')
                                                        ->middleware('permission:CategoriaMaterial.index');
    Route::get('almacen/categoriaMaterial/create', 'CategoriaMaterialController@create')
                                                        ->middleware('permission:CategoriaMaterial.create');
    Route::patch('almacen/categoriaMaterial/{role}', 'CategoriaMaterialController@update')-> name('categoriaMaterial.update')
                                                        ->middleware('permission:CategoriaMaterial.edit');
    Route::get('almacen/categoriaMaterial/{role}', 'CategoriaMaterialController@show')
                                                        ->middleware('permission:CategoriaMaterial.show');
    Route::delete('almacen/categoriaMaterial/{role}', 'CategoriaMaterialController@destroy')
                                                        ->middleware('permission:CategoriaMaterial.destroy');
    Route::get('almacen/categoriaMaterial/{role}/edit', 'CategoriaMaterialController@edit')
                                                        ->middleware('permission:CategoriaMaterial.edit');

    //material

    Route::post('almacen/material/store', 'MaterialController@store')->name('material.store')
                                                        ->middleware('permission:Material.create');
    Route::get('almacen/material', 'MaterialController@index')
                                                        ->middleware('permission:Material.index');
    Route::get('almacen/material/create', 'MaterialController@create')
                                                        ->middleware('permission:Material.create');
    Route::patch('almacen/material/{role}', 'MaterialController@update')->name('material.update')
                                                        ->middleware('permission:Material.edit');
    Route::get('almacen/material/{role}', 'MaterialController@show')
                                                        ->middleware('permission:Material.show');
    Route::delete('almacen/material/{role}', 'MaterialController@destroy')
                                                        ->middleware('permission:Material.destroy');
    Route::get('almacen/material/{role}/edit', 'MaterialController@edit')
                                                        ->middleware('permission:Material.edit');
    //cliente 

    Route::post('ventas/cliente/store', 'ClienteController@store')->name('cliente.store')
                                                        ->middleware('permission:Cliente.create');
    Route::post('ventas/cliente/store2', 'ClienteController@store2')->name('cliente.store2')
                                                        ->middleware('permission:Cliente.create');
    Route::get('ventas/cliente', 'ClienteController@index')
                                                        ->middleware('permission:Cliente.index');
    Route::get('ventas/cliente/create', 'ClienteController@create')
                                                        ->middleware('permission:Cliente.create');
    Route::get('ventas/cliente/create2', 'ClienteController@create2')
                                                        ->middleware('permission:Cliente.create');
    Route::patch('ventas/cliente/{role}', 'ClienteController@update')->name('cliente.update')
                                                        ->middleware('permission:Cliente.edit');
    Route::get('ventas/cliente/{role}', 'ClienteController@show')
                                                        ->middleware('permission:Cliente.show');
    Route::delete('ventas/cliente/{role}', 'ClienteController@destroy')
                                                        ->middleware('permission:Cliente.destroy');
    Route::get('ventas/cliente/{role}/edit', 'ClienteController@edit')
                                                        ->middleware('permission:Cliente.edit');

    //proveedor

    Route::post('compras/proveedor/store', 'ProveedorController@store')->name('proveedor.store')
                                                        ->middleware('permission:Proveedor.create');
    Route::get('compras/proveedor', 'ProveedorController@index')
                                                        ->middleware('permission:Proveedor.index');
    Route::get('compras/proveedor/create', 'ProveedorController@create')
                                                        ->middleware('permission:Proveedor.create');
    Route::patch('compras/proveedor/{role}', 'ProveedorController@update')->name('proveedor.update')
                                                        ->middleware('permission:Proveedor.edit');
    Route::get('compras/proveedor/{role}', 'ProveedorController@show')
                                                        ->middleware('permission:Proveedor.show');
    Route::delete('compras/proveedor/{role}', 'ProveedorController@destroy')
                                                        ->middleware('permission:Proveedor.destroy');
    Route::get('compras/proveedor/{role}/edit', 'ProveedorController@edit')
                                                        ->middleware('permission:Proveedor.edit');
    //  ingreso

    Route::post('compras/ingreso/store', 'IngresoController@store')->name('ingreso.store')
                                                        ->middleware('permission:Ingreso.create');
    Route::get('compras/ingreso', 'IngresoController@index')
                                                        ->middleware('permission:Ingreso.index');
    Route::get('compras/ingreso/create', 'IngresoController@create')
                                                        ->middleware('permission:Ingreso.create');
    Route::patch('compras/ingreso/{role}', 'IngresoController@update')->name('ingreso.update')
                                                        ->middleware('permission:Ingreso.edit');
    Route::get('compras/ingreso/{role}', 'IngresoController@show')
                                                        ->middleware('permission:Ingreso.show');
    Route::delete('compras/ingreso/{role}', 'IngresoController@destroy')
                                                        ->middleware('permission:Ingreso.destroy');
    Route::get('compras/ingreso/{role}/edit', 'IngresoController@edit')
                                                        ->middleware('permission:Ingreso.edit');
    //venta

    Route::post('ventas/venta/store', 'VentaServicioController@store')->name('ventaServicio.store')
                                                        ->middleware('permission:VentaServicio.create');
    Route::get('ventas/venta', 'VentaServicioController@index')
                                                        ->middleware('permission:VentaServicio.index');
    Route::get('ventas/venta/create', 'VentaServicioController@create')
                                                        ->middleware('permission:VentaServicio.create');
    Route::get('ventas/venta/create0', 'VentaServicioController@create0')
                                                        ->middleware('permission:VentaServicio.create');
    Route::get('ventas/venta/create1', 'VentaServicioController@create1')
                                                        ->middleware('permission:VentaServicio.create');
    Route::patch('ventas/venta/{role}', 'VentaServicioController@update')->name('venta.update')
                                                        ->middleware('permission:VentaServicio.edit');
    Route::get('ventas/venta/{role}', 'VentaServicioController@show')
                                                        ->middleware('permission:VentaServicio.show');
    Route::delete('ventas/venta/{role}', 'VentaServicioController@destroy')
                                                        ->middleware('permission:VentaServicio.destroy');
    Route::get('ventas/venta/{role}/edit', 'VentaServicioController@edit')
                                                        ->middleware('permission:VentaServicio.edit');

                                                        
   // Route::get('inicio/graficas','VentaServicioController@inicio')
   // ->middleware('permission:VentaServicio.index');

                                                        
    //usuario

    Route::post('seguridad/usuario/store', 'UsuarioController@store')->name('usuario.store')
                                                        ->middleware('permission:Usuario.create');
    Route::get('seguridad/usuario', 'UsuarioController@index')
                                                        ->middleware('permission:Usuario.index');
    Route::get('seguridad/usuario/create', 'UsuarioController@create')
                                                        ->middleware('permission:Usuario.create');
    Route::patch('seguridad/usuario/{role}', 'UsuarioController@update')->name('usuario.update')
                                                        ->middleware('permission:Usuario.edit');
    Route::get('seguridad/usuario/{role}', 'UsuarioController@show')
                                                        ->middleware('permission:Usuario.show');
    Route::delete('seguridad/usuario/{role}', 'UsuarioController@destroy')
                                                        ->middleware('permission:Usuario.destroy');
    Route::get('seguridad/usuario/{role}/edit', 'UsuarioController@edit')
                                                        ->middleware('permission:Usuario.edit');
    //evento

    Route::post('eventos/evento/store', 'EventoController@store')->name('evento.store')
                                                        ->middleware('permission:Evento.create');
    Route::get('eventos/evento', 'EventoController@index')
                                                        ->middleware('permission:Evento.index');
    Route::get('eventos/evento/create', 'EventoController@create')
                                                        ->middleware('permission:Evento.create');
    Route::patch('eventos/evento/{role}', 'EventoController@update')->name('evento.update')
                                                        ->middleware('permission:Evento.edit');
    Route::get('eventos/evento/{role}', 'EventoController@show')
                                                        ->middleware('permission:Evento.show');
    Route::delete('eventos/evento/{role}', 'EventoController@destroy')->name('evento.destroy')
                                                        ->middleware('permission:Evento.destroy');
    Route::get('eventos/evento/{role}/edit', 'EventoController@edit')
                                                        ->middleware('permission:Evento.edit');
    // categoria servicio

    Route::post('bancoServicio/categoriaServicio/store', 'CategoriaServicioController@store')->name('categoriaServicio.store')
                                                        ->middleware('permission:CategoriaServicio.create');
    Route::get('bancoServicio/categoriaServicio', 'CategoriaServicioController@index')
                                                        ->middleware('permission:CategoriaServicio.index');
    Route::get('bancoServicio/categoriaServicio/create', 'CategoriaServicioController@create')
                                                        ->middleware('permission:CategoriaServicio.create');
    Route::patch('bancoServicio/categoriaServicio/{role}', 'CategoriaServicioController@update')->name('categoriaServicio.update')
                                                        ->middleware('permission:CategoriaServicio.edit');
    Route::get('bancoServicio/categoriaServicio/{role}', 'CategoriaServicioController@show')  
                                                       ->middleware('permission:CategoriaServicio.show');
    Route::delete('bancoServicio/categoriaServicio/{role}', 'CategoriaServicioController@destroy')
                                                        ->middleware('permission:CategoriaServicio.destroy');
    Route::get('bancoServicio/categoriaServicio/{role}/edit', 'CategoriaServicioController@edit')
                                                        ->middleware('permission:CategoriaServicio.edit');
    //servicio

    Route::post('bancoServicio/servicio/store', 'ServicioController@store')->name('servicio.store')
                                                        ->middleware('permission:Servicio.create');
    Route::get('bancoServicio/servicio', 'ServicioController@index')
                                                        ->middleware('permission:Servicio.index');
    Route::get('bancoServicio/servicio/create', 'ServicioController@create')
                                                        ->middleware('permission:Servicio.create');
    Route::patch('bancoServicio/servicio/{role}', 'ServicioController@update')->name('servicio.update')
                                                        ->middleware('permission:Servicio.edit');
    Route::get('bancoServicio/servicio/{role}', 'ServicioController@show')
                                                        ->middleware('permission:Servicio.show');
    Route::delete('bancoServicio/servicio/{role}', 'ServicioController@destroy')
                                                        ->middleware('permission:Servicio.destroy');
    Route::get('bancoServicio/servicio/{role}/edit', 'ServicioController@edit')
                                                        ->middleware('permission:Servicio.edit');
    //Equipos

    Route::post('ventas/equipo/store', 'EquipoController@store')->name('equipo.store')
                                                        ->middleware('permission:Equipo.create');
    Route::post('ventas/equipo/store2', 'EquipoController@store2')->name('equipo.store2')
                                                        ->middleware('permission:Equipo.create');
    Route::get('ventas/equipo', 'EquipoController@index')
                                                        ->middleware('permission:Equipo.index');
    Route::get('ventas/equipo/create', 'EquipoController@create')
                                                        ->middleware('permission:Equipo.create');
    Route::get('ventas/equipo/create2', 'EquipoController@create2')
                                                        ->middleware('permission:Equipo.create');
    Route::get('ventas/equipo/create3/{role}', 'EquipoController@create3')
                                                        ->middleware('permission:Equipo.create');
    Route::patch('ventas/equipo/{role}', 'EquipoController@update')->name('equipo.update')
                                                        ->middleware('permission:Equipo.edit');
    Route::get('ventas/equipo/{role}', 'EquipoController@show')->name('equipo.show')
                                                        ->middleware('permission:Equipo.show');
    Route::delete('ventas/equipo/{role}', 'EquipoController@destroy')
                                                        ->middleware('permission:Equipo.destroy');
    Route::get('ventas/equipo/{role}/edit', 'EquipoController@edit')
                                                        ->middleware('permission:Equipo.edit');


    //Roles 
    Route::post('seguridad/roles/store', 'RolController@store')->name('rol.store')
                                                        ->middleware('permission:Rol.create');
    Route::get('seguridad/roles', 'RolController@index')
                                                        ->middleware('permission:Rol.index');
    Route::get('seguridad/roles/create', 'RolController@create')
                                                        ->middleware('permission:Rol.create');
    Route::patch('seguridad/roles/{role}', 'RolController@update')->name('rol.update')
                                                        ->middleware('permission:Rol.edit');
    Route::get('seguridad/roles/{role}', 'RolController@show')
                                                        ->middleware('permission:Rol.show');
    Route::delete('seguridad/roles/{role}', 'RolController@destroy')
                                                        ->middleware('permission:Rol.destroy');
    Route::get('seguridad/roles/{role}/edit', 'RolController@edit')
                                                        ->middleware('permission:Rol.edit');

                                                            //Solicitudes
//     Route::post('solicitudes/solicitud/store', 'SolicitudController@store')->name('solicitud.store')
//     ->middleware('permission:Sol.create');
// Route::get('solicitudes/solicitud', 'SolicitudController@index')
//    ->middleware('permission:Sol.index');
// Route::get('solicitudes/solicitud/create', 'SolicitudController@create')
//    ->middleware('permission:Sol.create');
// Route::patch('solicitudes/solicitud/{role}', 'SolicitudController@update')->name('solicitud.update')
//    ->middleware('permission:Sol.edit');
// Route::get('solicitudes/solicitud/{role}', 'SolicitudController@show')
//    ->middleware('permission:Sol.show');
// Route::delete('solicitudes/solicitud/{role}', 'SolicitudController@destroy')
//    ->middleware('permission:Sol.destroy');
// Route::get('solicitudes/solicitud/{role}/edit', 'SolicitudController@edit')
//    ->middleware('permission:Sol.edit');

  //Solicitudes 2
//   Route::post('solicitudes/solicitud2/store', 'Solicitud2Controller@store')->name('solicitud2.store')
//   ->middleware('permission:Sol.create');
// Route::get('solicitudes/solicitud2', 'Solicitud2Controller@index')
//  ->middleware('permission:Sol.index');
// Route::get('solicitudes/solicitud2/create', 'Solicitud2Controller@create')
//  ->middleware('permission:Sol.create');
// Route::patch('solicitudes/solicitud2/{role}', 'Solicitud2Controller@update')->name('solicitud2.update')
//  ->middleware('permission:Sol.edit');
// Route::get('solicitudes/solicitud2/{role}', 'Solicitud2Controller@show')
//  ->middleware('permission:Sol.show');
// Route::delete('solicitudes/solicitud2/{role}', 'Solicitud2Controller@destroy')
//  ->middleware('permission:Sol.destroy');
// Route::get('solicitudes/solicitud2/{role}/edit', 'Solicitud2Controller@edit')
//  ->middleware('permission:Sol.edit');
//  Route::get('solicitud2/{role}', 'Solicitud2Controller@actualizarSolicitud')->name('solicitud.boton')
//  ->middleware('permission:Sol.edit');

//Solicitudes 

Route::post('solicitudes/solicitud/store', 'SolicitudController@store')->name('solicitud.store')
  ->middleware('permission:Sol.create');
  Route::post('solicitudes/solicitud/store2', 'SolicitudController@store2')->name('solicitud.store2')
  ->middleware('permission:Sol.create');
Route::get('solicitudes/solicitud', 'SolicitudController@index')
 ->middleware('permission:Sol.index');
Route::get('solicitudes/solicitud/create1', 'SolicitudController@create1')
 ->middleware('permission:Sol.create');
 Route::get('solicitudes/solicitud/create2', 'SolicitudController@create2')
 ->middleware('permission:Sol.create');
 Route::get('solicitudes/solicitud/create3', 'SolicitudController@create3')
 ->middleware('permission:Sol.create');
Route::patch('solicitudes/solicitud/{role}', 'SolicitudController@update')->name('solicitud.update')
 ->middleware('permission:Sol.edit');
Route::get('solicitudes/solicitud/{role}', 'SolicitudController@show')
 ->middleware('permission:Sol.show');
Route::delete('solicitudes/solicitud/{role}', 'SolicitudController@destroy')
 ->middleware('permission:Sol.destroy');
Route::get('solicitudes/solicitud/{role}/edit', 'SolicitudController@edit')
 ->middleware('permission:Sol.edit');
 Route::get('solicitud/{role}', 'SolicitudController@actualizarSolicitud')->name('solicitud.boton')
 ->middleware('permission:Sol.edit');



//Reclamos
  Route::post('reclamos/reclamo/store', 'ReclamoController@store')->name('reclamo.store')
  ->middleware('permission:Sol.create');
Route::get('reclamos/reclamo', 'ReclamoController@index')
 ->middleware('permission:Sol.index');
Route::get('reclamos/reclamo/create', 'ReclamoController@create')
 ->middleware('permission:Sol.create');
Route::patch('reclamos/reclamo/{role}', 'ReclamoController@update')->name('reclamo.update')
 ->middleware('permission:Sol.edit');
Route::get('reclamos/reclamo/{role}', 'ReclamoController@show')
 ->middleware('permission:Sol.show');
Route::delete('reclamos/reclamo/{role}', 'ReclamoController@destroy')
 ->middleware('permission:Sol.destroy');
Route::get('reclamos/reclamo/{role}/edit', 'ReclamoController@edit')
 ->middleware('permission:Sol.edit');
 Route::get('reclamo/{role}', 'ReclamoController@actualizarReclamo')->name('reclamo.boton')
 ->middleware('permission:Sol.edit');
 
                                          //categorias de equipos
   Route::post('equipos/categoriaEquipo/store', 'CategoriaEquipoController@store')->name('categoriaEquipo.store')
    ->middleware('permission:CategoriaEquipo.create');
Route::get('equipos/categoriaEquipo', 'CategoriaEquipoController@index')
   ->middleware('permission:CategoriaEquipo.index');
Route::get('equipos/categoriaEquipo/create', 'CategoriaEquipoController@create')
   ->middleware('permission:CategoriaEquipo.create');
Route::patch('equipos/categoriaEquipo/{role}', 'CategoriaEquipoController@update')->name('categoriaEquipo.update')
   ->middleware('permission:CategoriaEquipo.edit');
Route::get('equipos/categoriaEquipo/{role}', 'CategoriaEquipoController@show')
   ->middleware('permission:CategoriaEquipo.show');
Route::delete('equipos/categoriaEquipo/{role}', 'CategoriaEquipoController@destroy')
   ->middleware('permission:CategoriaEquipo.destroy');
Route::get('equipos/categoriaEquipo/{role}/edit', 'CategoriaEquipoController@edit')
   ->middleware('permission:CategoriaEquipo.edit');
                                          //tipos de equipo
Route::post('equipos/tipoEquipo/store', 'TipoEquipoController@store')->name('tipoEquipo.store')
    ->middleware('permission:TipoEquipo.create');
Route::get('equipos/tipoEquipo', 'TipoEquipoController@index')
   ->middleware('permission:TipoEquipo.index');
Route::get('equipos/tipoEquipo/create', 'TipoEquipoController@create')
   ->middleware('permission:TipoEquipo.create');
Route::patch('equipos/tipoEquipo/{role}', 'TipoEquipoController@update')->name('tipoEquipo.update')
   ->middleware('permission:TipoEquipo.edit');
Route::get('equipos/tipoEquipo/{role}', 'TipoEquipoController@show')
   ->middleware('permission:TipoEquipo.show');
Route::delete('equipos/tipoEquipo/{role}', 'TipoEquipoController@destroy')
   ->middleware('permission:TipoEquipo.destroy');
Route::get('equipos/tipoEquipo/{role}/edit', 'TipoEquipoController@edit')
   ->middleware('permission:TipoEquipo.edit');
                                          //marcas

Route::post('equipos/marca/store', 'MarcaController@store')->name('marca.store')
    ->middleware('permission:Marca.create');
Route::get('equipos/marca', 'MarcaController@index')
   ->middleware('permission:Marca.index');
Route::get('equipos/marca/create', 'MarcaController@create')
   ->middleware('permission:Marca.create');
Route::patch('equipos/marca/{role}', 'MarcaController@update')->name('marca.update')
   ->middleware('permission:Marca.edit');
Route::get('equipos/marca/{role}', 'MarcaController@show')
   ->middleware('permission:Marca.show');
Route::delete('equipos/marca/{role}', 'MarcaController@destroy')
   ->middleware('permission:Marca.destroy');
Route::get('equipos/marca/{role}/edit', 'MarcaController@edit')
   ->middleware('permission:Marca.edit');
   
                     //inicio 

  // Route::resource('inicio/graficas', 'InicioController');

// Route::post('inicio/store', 'InicioController@store')->name('inicio.store')
//     ->middleware('permission:Inicio.create');
// Route::get('inicio', 'InicioController@index')
//    ->middleware('permission:Inicio.index');
// Route::get('inicio/create', 'InicioController@create')
//    ->middleware('permission:Inicio.create');
// Route::patch('inicio/{role}', 'InicioController@update')->name('inicio.update')
//    ->middleware('permission:Inicio.edit');
// Route::get('inicio/{role}', 'InicioController@show')
//    ->middleware('permission:Inicio.show');
// Route::delete('inicio/{role}', 'InicioController@destroy')
//    ->middleware('permission:Inicio.destroy');
// Route::get('inicio/{role}/edit', 'InicioController@edit')
//    ->middleware('permission:Inicio.edit');
   





});

                                                      
