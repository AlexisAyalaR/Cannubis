<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use DB;
use App\imagen;

class producto extends Model
{
    /* 
    * Funcion que se encarga de dar la relación entre usuario y producto
    * Parametros:
    * Return: el usuario de cada producto
    */
	public function usuario(){

		return $this->belongsTo(Usuario::class);
	}

    /* 
    * Funcion que se encarga de dar la relación entre producto e imagen
    * Parametros:
    * Return: las imágenes de cada producto
    */
    public function imagen(){

        return $this->hasMany(imagen::class);
    }

    /* 
    * Funcion que se encarga de agregar un producto a la base de datos
    * Parametros: Los datos del usuario a agregar
    * Return: 
    */
    public static function agregaProducto($nombre, $precio, $cantidad, $esp, $desc){

        DB::table('producto')->insert(
            ['nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad, 'especificaciones' => $esp, 'descripcion' => $desc]
        );
    }

    /* 
    * Funcion que se encarga de eliminar un producto de la base de datos
    * Parametros: El nombre del producto [PELIGRO: QUE MAS DE DOS PRODUCTOS TENGAN EL MISMO NOMBRE]
    * Return: el id del producto que borró
    */
    public static function eliminaProducto($nombre){

        $id = DB::table('producto')->where('nombre', $nombre)->value('id');

    	DB::table('producto')->where('id', $id)->delete();

        return $id;
    }

    /* 
    * Funcion que se encarga de buscar todos los productos
    * Parametros: 
    * Return: información de los productos
    */
    public static function getProductos(){
        $productos = DB::table('producto')->get();
        
        return $productos;
    }

    /* 
    * Funcion que se encarga de buscar un producto en específico
    * Parametros: Nombre del producto
    * Return: información de los productos
    */
    public static function getProducto($nombre){
        $producto = DB::table('producto')->where('nombre', $nombre)->get();
        
        return $producto;
    }

    /* 
    * Funcion que se encarga de buscar los nombres de los productos
    * Parametros: 
    * Return: todos los nombres de los productos
    */
    public static function getNombresProductos(){
        $nombres = DB::table('producto')->select('nombre')->get();
        
        return $nombres;
    }

    /* 
    * Funcion que se encarga de buscar el id del producto seleccionado
    * Parametros: nombre del producto a buscar
    * Return: id del producto
    */
    public static function getNombreById($nombre){
        $id = DB::table('producto')->select('id')->where('nombre', $nombre)->get();
        
        return $id;
    }

    public static function editaProducto($nom, $prec, $cant, $esp, $desc){
        
        $nombre = DB::table('producto')
        ->where('nombre', $nom)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('precio' => $prec, 'cantidad' => $cant, 'especificaciones' => $esp, 'descripcion' => $desc));  

        return $nombre;
    }

}
