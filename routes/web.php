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

Route::get('/mota', 'ProductController@load_product_page');


/*Registra un producto nuevo
FALTA HTML DISEÑO*/
Route::post('/registraProducto', ["uses" => 'ProductController@registraProducto']);

/*Elimina un usuario existente
FALTA HTML DISEÑO*/
Route::post('/eliminaProducto', ["uses" => 'ProductController@eliminaProducto']);

/*Carga el dropdown de los productos
FALTA HTML DISEÑO*/
//HACERLO POST
Route::get('/getNombresProductos', 'ProductController@cargaNombresProductos');




Route::get('/getProductos', 'ProductController@cargaProductos');


