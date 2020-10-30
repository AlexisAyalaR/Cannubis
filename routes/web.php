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


//INDEX
/*
Ruta que carga la función index en Homecontroller 
Carga view index.php
 */
Route::get('/', 'HomeController@index');
/*
Carga la información de los productos generando divs
FALTA HTML DISEÑO*/
Route::get('/getProductos', 'ProductController@cargaProductos');
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
/*
Ruta que carga la función load_product_page 
Carga view productos.php
 */
Route::get('/pruebas', 'ProductController@load_pruebas');



//USUARIO
/*
Registra un producto nuevo
FALTA HTML DISEÑO*/
Route::post('/registraProducto', 'ProductController@registraProducto');
/*
Sube imágen de producto seleccionado
FALTA HTML DISEÑO*/
Route::post('/registraImagen', 'ImageController@registraImagen');
/*
Carga el dropdown de los productos
FALTA HTML DISEÑO*/
Route::get('/getNombresProductos', 'ProductController@cargaNombresProductos');
/*
Elimina un usuario existente
FALTA HTML DISEÑO*/
Route::post('/eliminaProducto', 'ProductController@eliminaProducto');
/*
Edita los datos de un producto existente
FALTA DISEÑO HTML*/
Route::post('/editarProducto', 'ProductController@editarProducto');
/*
Carga los datos de un producto en específico
FALTA DISEÑO HTML*/
Route::get('/getInfoProducto/{nombre}', 'ProductController@cargaProducto');
/*
Elimina una imagen
FALTA DISEÑO HTML**/
Route::post('/eliminaImagen', 'ImageController@eliminaImagen');



//USUARIOADMIN
/*
Carga el dropdown de los emails de los usuarios
FALTA DISEÑO HTML*/
Route::get('/getEmailsUsuarios', 'UsuarioController@cargaEmailsUsuarios');
/*
Registra un usuario nuevo
FALTA DISEÑO HTML*/
Route::post('/registraUsuario', 'UsuarioController@registraUsuario');
/*
Elimina un usuario existente
FALTA DISEÑO HTML*/
Route::post('/eliminaUsuario', 'UsuarioController@eliminaUsuario');






Route::get('/prueba', 'ProductController@cargaImagenes');



