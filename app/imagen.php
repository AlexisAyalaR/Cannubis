<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use DB;

class imagen extends Model
{
    protected $table = 'imagen';
    protected $fillable = ['nombre', 'idProducto'];
    /* 
    * Funcion que se encarga de dar la relación entre producto e imágenes
    * Parametros:
    * Return: el producto de cada imagen
    */
    public function producto(){

        return $this->belongsTo(producto::class);
    }

    /*
    * Funcion que se encarga de encontrar las imágenes asociadas a un producto
    * Parámetros: El id del producto
    * Return: Los nombres de las imágenes asociadas al producto
    */
    public static function getImagen($prodId){
        $nombres = DB::table('imagen')->select('nombre')->where('idProducto', $prodId)->get();
        
        return $nombres;
    }

    /*
    * Funcion que se encarga de eliminar una imagen
    * Parámetros: El nombre de la imagen
    * Return: 
    */
    public static function eliminaImagen($nombre){
        $id = DB::table('imagen')->where('nombre', $nombre)->value('id');

        DB::table('imagen')->where('id', $id)->delete();

        return $id;
    }

    /*
    * Funcion que se encarga de eliminar una imagen dado el id del producto al que pertenece
    * Parámetros: El nombre de la imagen
    * Return: 
    */
    public static function eliminaImagenId($idProd){

        DB::table('imagen')->where('idProducto', $idProd)->delete();

    }


}
