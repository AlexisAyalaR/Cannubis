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

/*
Ruta que carga la función index en Homecontroller 
Carga view index.php
 */
Route::get('/', 'HomeController@index');
/*
Ruta que carga la función load_product_page 
Carga view usuario.php
 */
Route::get('/usuario', 'UsuarioController@load_product_page');
/*
Ruta que carga la función load_product_page 
Carga view usuarioAdmin.php
 */
Route::get('/usuarioAdmin', 'UsuarioController@load_usuarioAdmin');



Route::get('/pruebas', 'ProductController@load_pruebas');


Route::get('/prueba', 'ProductController@cargaImagenes');


/*Registra un producto nuevo
FALTA HTML DISEÑO*/
Route::post('/registraProducto', ["uses" => 'ProductController@registraProducto']);

/*Elimina un usuario existente
FALTA HTML DISEÑO*/
Route::post('/eliminaProducto', ["uses" => 'ProductController@eliminaProducto']);

/*Carga el dropdown de los productos
FALTA HTML DISEÑO*/
Route::get('/getNombresProductos', 'ProductController@cargaNombresProductos');

/*Carga la información de los productos generando divs
FALTA HTML DISEÑO*/
Route::get('/getProductos', 'ProductController@cargaProductos');

/*Sube imágen de producto seleccionado
FALTA HTML DISEÑO*/
Route::post('/registraImagen', 'ImageController@registraImagen');





Route::get('/getEmailsUsuarios', 'UsuarioController@cargaEmailsUsuarios');


Route::post('/registraUsuario', 'UsuarioController@registraUsuario');


Route::post('/eliminaUsuario', 'UsuarioController@eliminaUsuario');


