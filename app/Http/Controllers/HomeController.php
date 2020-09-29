<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	/* 
    * Funcion que se encarga de cargar index.php
    * Parametros: 
    * Return: Redirecciona a la página indicada
    */
    function index(){
    	//$productos = producto::getProductos();
    	return view('index');

    }
}
