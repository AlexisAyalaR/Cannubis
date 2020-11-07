<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use DB;

class imagen extends Model
{
    protected $table = 'imagen';
    protected $fillable = ['nombre', 'idProducto', 'principal'];
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
        $nombres = DB::table('imagen')->where('idProducto', $prodId)->get();
        
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

    /*
    * Funcion que se encarga de obtener la imagen principal de un producto
    * Parámetros: Id el producto
    * Return: 
    */
    public static function getPrincipal($idProd){
        
        $imagen = DB::table('imagen')
        ->where('idProducto', $idProd)
        ->where('principal', '1')
        ->select('nombre')->get();
        
        return $imagen;

    }
    
    public static function editPrincipal($nombre, $princ){

        $nombre = DB::table('imagen')
        ->where('nombre', $nombre)
        ->limit(1)
        ->update(array('principal' => $princ));  

    }

}
