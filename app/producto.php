<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use DB;

//Usar todo creando Object Programming

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
    * Return: 
    */
    public static function eliminaProducto($nombre){

        $id = DB::table('producto')->where('nombre', $nombre)->value('id');

    	DB::table('producto')->where('id', $id)->delete();

        return $id;
    }

    public static function getProductos(){
        $productos = DB::table('producto')->get();
        
        return $productos;
    }



    public static function getNombresProductos(){
        $nombres = DB::table('producto')->select('nombre')->get();
        
        return $nombres;
    }

}
