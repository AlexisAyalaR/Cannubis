<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\producto;

class ProductController extends Controller
{
    function load_product_page(){
    	return view('product');
    }

    function prueba(){
    	return redirect()->back();
    }


    /* 
    * Funcion que se encarga de registrar un producto
    * Parametros: Request->POST
    * Return:
    */
	public function registraProducto(Request $req){
		//FALTA VALIDAR QUE LOS DATOS SI SEAN DE LO QUE SE PIDE
    	$nombre = $req->input('nombre');
    	$precio = $req->input('precio');
    	$cantidad = $req->input('cantidad');
    	$esp = $req->input('especificaciones');
    	$desc = $req->input('descripcion');
    	//FALTA IMAGEN

    	try{
    		producto::agregaProducto($nombre, $precio, $cantidad, $esp, $desc);

    	}catch(\Exception $e){
    		\Log::info('Error getInfo: '.$e);
            session(['registraProducto' => -1]);
            return redirect()->back();
    	}
        session(['registraProducto' => 1]);
        return redirect()->back();
    }

    /* 
    * Funcion que se encarga de eliminar un producto
    * Parametros: Request->POST
    * Return:
    */
    public function eliminaProducto(Request $req){

        //VALIDADO
        $nombre = $_POST['productoActual'];
        //$nombre = $req->input('nombreProds');

        if($nombre == ''){
            session(['eliminaUsuario' => -1]);
            return redirect()->back();
        }

        try{
            $id = producto::eliminaProducto($nombre);

        }catch(Exception $e){
            \Log::info('Error getInfo: '.$e);
            session(['eliminaProducto' => -1]);
            return redirect()->back();

        }
        session(['eliminaProducto' => 1]);
        return redirect()->back();
    }


    public function cargaNombresProductos(){
    	$nombres = producto::getNombresProductos();
    	return \Response::json(["nombres" => $nombres], 200);
    }


    public function cargaProductos(){
    	$productos = producto::getProductos();
    	return \Response::json(["productos" => $productos], 200);
    }


}
