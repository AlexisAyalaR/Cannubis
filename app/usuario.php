<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use DB;

class usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'email', 'contraseña', 'tipo'];
    protected $primaryKey = 'email';
    /* 
    *
    * AGREGAR LOS PRODUCTOS DE CADA USUARIO
    *
    * Funcion que se encarga de dar la relación entre producto e imágenes
    * Parametros:
    * Return: el producto de cada imagen
    *
    public function producto(){

        return $this->hasMany(producto::class);
    }
    */

    /* 
    * Funcion que se encarga de eliminar un producto de la base de datos
    * Parametros: El nombre del producto [PELIGRO: QUE MAS DE DOS PRODUCTOS TENGAN EL MISMO NOMBRE]
    * Return: 
    */
    public static function eliminaUsuario($email){

        $id = DB::table('usuarios')->where('email', $email)->value('id');

        DB::table('usuarios')->where('id', $id)->delete();

        return $id;
    }


    public static function getEmailsUsuarios(){
        $emails = DB::table('usuarios')->select('email')->get();
        
        return $emails;
    }


}
