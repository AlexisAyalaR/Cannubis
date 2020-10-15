<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagen;
use App\producto;

class ImageController extends Controller
{
    /* 
    * Funcion que se encarga de registrar una imagen y asociarlo a un producto
    * Parametros: Request->POST
    * Return:
    */
    public function registraImagen(Request $req) {

    	$imagen = new imagen();

    	if ($req -> hasfile('image')) {
    		$file = $req->file('image');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . "." . $extension;
    		$path = public_path('img');
    		$file -> move($path, $filename);
    		$imagen ->nombre = $filename;

            // Seleccionamos el producto
            $prod = $_POST['prodImg'];
            $idProd = producto::getNombreById($prod);
            $idProd = json_decode(json_encode($idProd), true)[0]['id'];
            $imagen ->idProducto = $idProd;

    	}else{
    		return $req;
    		$imagen ->nombre = '';
            $imagen ->idProducto = '';
    	}
        
    	$imagen->save();

    	return redirect()->back();
    }

    
}
