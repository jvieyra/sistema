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


/*::::::::::::Middleware para invitados::::::::::::::::*/
Route::group(['middleware'=>['guest']],function(){
  Route::get('/','Auth\LoginController@showLoginForm');
  Route::post('/login','Auth\LoginController@login')->name('login');
});


/*::::::::::Middleware para usuarios autenticados*/
Route::group(['middleware'=>['auth']],function(){
    Route::get('/main', function () {
      return view('contenido/contenido');
  })->name('main');
  
  Route::post('/logout','Auth\LoginController@logout')->name('logout');
    
  //Dashboard
  Route::get('/dashboard','DashboardController');
  
  //Notificaciones
  Route::post('/notification/get','NotificationController@get');
  
  /*::::::::.Middleware para almacenista*/
  Route::group(['middleware'=>['Almacenero']],function(){
    //:::::::::CATEGORIAS ::::::::::::::::::::::::::::::::::::::::::::::::::
    //obtener datos verbo get
    Route::get('/categoria','CategoriaController@index');
    //store CategoriaController
    Route::post('/categoria/registrar','CategoriaController@store');
    //Update verbo put
    Route::put('/categoria/actualizar','CategoriaController@update');
    //status
    Route::put('/categoria/desactivar','CategoriaController@desactivar');
    Route::put('/categoria/activar','CategoriaController@activar');
    Route::get('/categoria/selectCategoria','CategoriaController@selectCategoria');
    
    //:::::::::ARTICULOS ::::::::::::::::::::::::::::::::::::::::::::::::
    //obtener datos verbo get
    Route::get('/articulo','ArticuloController@index');
    //store articuloController
    Route::post('/articulo/registrar','ArticuloController@store');
    //Update verbo put
    Route::put('/articulo/actualizar','ArticuloController@update');
    //status
    Route::put('/articulo/desactivar','ArticuloController@desactivar');
    Route::put('/articulo/activar','ArticuloController@activar');
    Route::get('/articulo/buscarArticulo','ArticuloController@buscarArticulo');
    //listar articulos para modal compras
    Route::get('/articulo/listarArticulo','ArticuloController@listarArticulo');
    Route::get('/articulo/listarPdf','ArticuloController@listarPdf')->name('articulos_pdf');

    //:::::::PROVEEDORES:::::::::::::::::::::::::::::::::::::::::::
    Route::get('/proveedor','ProveedorController@index');
    //store ProveedorController
    Route::post('/proveedor/registrar','ProveedorController@store');
    //Update verbo put
    Route::put('/proveedor/actualizar','ProveedorController@update');

    Route::get('/proveedor/selectProveedor','ProveedorController@selectProveedor');
    
    //::::::::::::::::::::INGRESOS :::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/ingreso','IngresoController@index');
    //store articuloController
    Route::post('/ingreso/registrar','IngresoController@store');
    Route::put('/ingreso/desactivar','IngresoController@desactivar');
    Route::put('/ingreso/activar','IngresoController@activar');
    Route::get('/ingreso/obtenerCabecera','IngresoController@obtenerCabecera');
    Route::get('/ingreso/obtenerDetalles','IngresoController@obtenerDetalles');

  }); // .Almacenista
  
  
  
  Route::group(['middleware'=>['Vendedor']],function(){
    //:::::::CLIENTES:::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/cliente','ClienteController@index');
    //store ClienteController
    Route::post('/cliente/registrar','ClienteController@store');
    //Update verbo put
    Route::put('/cliente/actualizar','ClienteController@update');
    Route::get('/cliente/selectCliente','ClienteController@selectCliente');
    
    //:::::::::::::::::::::Articulos:::::::::::::::::::::::::::::::::::::
    Route::get('/articulo/buscarArticuloVenta','ArticuloController@buscarArticuloVenta');
    Route::get('/articulo/listarArticuloVenta','ArticuloController@listarArticuloVenta');
    
    //::::::VENTAS ::::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/venta','VentaController@index');
    Route::put('/venta/desactivar','VentaController@desactivar');
    Route::put('/venta/activar','VentaController@activar');
    Route::get('/venta/obtenerCabecera','VentaController@obtenerCabecera');
    Route::get('/venta/obtenerDetalles','VentaController@obtenerDetalles');
    Route::post('/venta/registrar','VentaController@store');
    Route::get('/venta/pdf/{id}','VentaController@pdf')->name('venta_pdf');

  });// .Vendedor

  
    
  Route::group(['middleware'=>['Administrador']],function(){
    //:::::::::CATEGORIAS ::::::::::::::::::::::::::::::::::::::::::::::::::
    //obtener datos verbo get
    Route::get('/categoria','CategoriaController@index');
    //store CategoriaController
    Route::post('/categoria/registrar','CategoriaController@store');
    //Update verbo put
    Route::put('/categoria/actualizar','CategoriaController@update');
    //status
    Route::put('/categoria/desactivar','CategoriaController@desactivar');
    Route::put('/categoria/activar','CategoriaController@activar');
    Route::get('/categoria/selectCategoria','CategoriaController@selectCategoria');
    
    //:::::::::ARTICULOS ::::::::::::::::::::::::::::::::::::::::::::::::
    //obtener datos verbo get
    Route::get('/articulo','ArticuloController@index');
    //store articuloController
    Route::post('/articulo/registrar','ArticuloController@store');
    //Update verbo put
    Route::put('/articulo/actualizar','ArticuloController@update');
    //status
    Route::put('/articulo/desactivar','ArticuloController@desactivar');
    Route::put('/articulo/activar','ArticuloController@activar');
    Route::get('/articulo/buscarArticulo','ArticuloController@buscarArticulo');
    Route::get('/articulo/listarArticulo','ArticuloController@listarArticulo');
    Route::get('/articulo/buscarArticuloVenta','ArticuloController@buscarArticuloVenta');
    Route::get('/articulo/listarArticuloVenta','ArticuloController@listarArticuloVenta');
    Route::get('/articulo/listarPdf','ArticuloController@listarPdf')->name('articulos_pdf');
    
    
    //:::::::PROVEEDORES:::::::::::::::::::::::::::::::::::::::::::
    Route::get('/proveedor','ProveedorController@index');
    //store ProveedorController
    Route::post('/proveedor/registrar','ProveedorController@store');
    //Update verbo put
    Route::put('/proveedor/actualizar','ProveedorController@update');
    Route::get('/proveedor/selectProveedor','ProveedorController@selectProveedor');

    //::::::::::INGRESOS ::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/ingreso','IngresoController@index');
    Route::post('/ingreso/registrar','IngresoController@store');
    Route::put('/ingreso/desactivar','IngresoController@desactivar');
    Route::put('/ingreso/activar','IngresoController@activar');
    Route::get('/ingreso/obtenerCabecera','IngresoController@obtenerCabecera');
    Route::get('/ingreso/obtenerDetalles','IngresoController@obtenerDetalles');
    
    
    //:::::::CLIENTES:::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/cliente','ClienteController@index');
    //store ClienteController
    Route::post('/cliente/registrar','ClienteController@store');
    //Update verbo put
    Route::put('/cliente/actualizar','ClienteController@update');
    Route::get('/cliente/selectCliente','ClienteController@selectCliente');
    
    //::::::: VENTAS :::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/venta','VentaController@index');
    Route::put('/venta/desactivar','VentaController@desactivar');
    Route::put('/venta/activar','VentaController@activar');
    Route::get('/venta/obtenerCabecera','VentaController@obtenerCabecera');
    Route::get('/venta/obtenerDetalles','VentaController@obtenerDetalles');
    Route::post('/venta/registrar','VentaController@store');
    Route::get('/venta/pdf/{id}','VentaController@pdf')->name('venta_pdf');
    

    //::::::::ROLES:::::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/rol','RolController@index');
    Route::get('/rol/selectRol','RolController@selectRol');


    //:::::::::USERS ::::::::::::::::::::::::::::::::::::::::::::::
    //obtener datos verbo get
    Route::get('/user','UserController@index');
    //store userController
    Route::post('/user/registrar','UserController@store');
    //Update verbo put
    Route::put('/user/actualizar','UserController@update');
    //status
    Route::put('/user/desactivar','UserController@desactivar');
    Route::put('/user/activar','UserController@activar');

    

  });// .Administrador
  


});



//:::::::::::::LOGIN:::::::::::::::::::::::::::::::::::::::::::
//Route::get('/home', 'HomeController@index')->name('home');

