<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagen;
use App\producto;

class ImageController extends Controller
{
    /* 
    * Funcion que se encarga de subir una imágen
    * Parametros: Imagen en form
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
            session_start();
            $prod = $_SESSION["currentProduct"];
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


    /* 
    * Funcion que se encarga de eliminar una imágen
    * Parametros: nombre de la imagen
    * Return: 
    */
    public function eliminaImagen(Request $req){
        $nombreImg = $req->input('imagen');
        
        try{
            $id = imagen::eliminaImagen($nombreImg);
            $path = public_path('img') . "/" . $nombreImg;
        
            if (file_exists($path)) {
                @unlink($path);

            }

        }catch(Exception $e){
            \Log::info('Error getInfo: '.$e);
            session(['eliminaImagen' => -1]);
            return redirect()->back();

        }
        session(['eliminaImagen' => 1]);
        return redirect()->back();
    }

    
}
