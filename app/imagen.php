<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use DB;

class imagen extends Model
{
    protected $table = 'imagen';
    protected $fillable = ['nombre'];
    /* 
    * Funcion que se encarga de dar la relación entre producto e imágenes
    * Parametros:
    * Return: el producto de cada imagen
    */
    public function producto(){

        return $this->belongsTo(producto::class);
    }



}
