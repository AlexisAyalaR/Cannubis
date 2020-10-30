<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\producto;

use App\imagen;


class ProductController extends Controller
{

    function load_pruebas(){
        return view('product');
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

        session_start();
        $nombre = $_SESSION["currentProduct"];

        if($nombre == ''){
            session(['eliminaUsuario' => -1]);
            return redirect()->back();
        }

        try{
            //Borramos el producto
            $id = producto::eliminaProducto($nombre);
            
            //Borramos los archivos
            $nombres = imagen::getImagen($id);
            $nombresFor = json_decode(json_encode($nombres), true);
            $n = count($nombresFor);

            for ($i=0; $i < $n; $i++) { 
                $path = public_path('img') . "/" . $nombresFor[$i]['nombre'];
        
                if (file_exists($path)) {
                    @unlink($path);

                }
            }
            //Borramos las filas en la DB
            imagen::eliminaImagenId($id);

        }catch(Exception $e){
            \Log::info('Error getInfo: '.$e);
            session(['eliminaProducto' => -1]);
            return redirect()->back();

        }
        session(['eliminaProducto' => 1]);
        return redirect()->back();
    }

    /* 
    * Funcion que se encarga de regresar nombres de productos
    * Parametros: 
    * Return: JSON nombresProd
    */
    public function cargaNombresProductos(){
    	$nombres = producto::getNombresProductos();
    	return \Response::json(["nombres" => $nombres], 200);
    }

    /* 
    * Funcion que se encarga de la información de productos
    * Parametros: 
    * Return: JSON infoProd
    */
    public function cargaProductos(){
        $productos = producto::getProductos();
        $prodFor = json_decode(json_encode($productos), true);
        $n = count($prodFor);
            
        $imagenes = array();

        for ($i=0; $i < $n; $i++) { 
            $imagenes[$i] = imagen::getImagen($prodFor[$i]['id']);
        }

        return \Response::json(["productos" => $productos, "imagenes" => $imagenes], 200);

    }


    /* 
    * Funcion que se encarga de la información de UN producto
    * Parametros: 
    * Return: JSON infoProd
    */
    public function cargaProducto($nombre){
        session_start();
        $_SESSION["currentProduct"]=$nombre;

        $producto = producto::getProducto($nombre);
        $prodFor = json_decode(json_encode($producto), true);
    
        $imagenes = array();

        $imagenes[0] = imagen::getImagen($prodFor[0]['id']);

        return \Response::json(["producto" => $producto, "imagenes" => $imagenes], 200);
    }

    /* 
    * Funcion que se encarga de editar un producto específico
    * Parametros: nombre, precio, cantidad, especificaciones, descripción
    * Return: 
    */
    public function editarProducto(Request $req){
        session_start();
        $nombre = $_SESSION["currentProduct"];
        $precio = $req->input('precio');
        $cantidad = $req->input('cantidad');
        $esp = $req->input('especificaciones');
        $desc = $req->input('descripcion');


        $producto = producto::editaProducto($nombre, $precio, $cantidad, $esp, $desc);

        return redirect()->back();
    }

    /* 
    * Funcion que se encarga de buscar todas las imágenes
    * Parametros: 
    * Return: El nombre de todas las imágenes
    */
    public function cargaImagenes(){
        $productos = producto::getProductos();
        $prodFor = json_decode(json_encode($productos), true);
        $n = count($prodFor);
            
        $imagenes = array();

        for ($i=0; $i < $n; $i++) { 
            $imagenes[$i] = imagen::getImagen($prodFor[$i]['id']);
        }

        $productos = producto::getProductos();

        return \Response::json(["productos" => $productos, "imagenes" => $imagenes], 200);

    }


}
