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
            $imagen ->principal = 0;

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
            $imagen ->principal = '';
    	}
        
    	$imagen->save();

    	return redirect()->back();
    }

    /* 
    * Funcion que se encarga de asignar si eliminar o establecer imagen principal dependiendo del input
    * Parametros: Click de alguno de los inputs
    * Return: 
    */
    public function setAction(Request $req){
        $nombreImg = $req->input('imagen');

        if ($nombreImg == '') {
            return redirect()->back();
        }

        switch ($req->input('action')) {

        case 'Borrar':
                return ImageController::eliminaImagen($req);
            break;

        case 'Establecer como imagen principal':
                return ImageController::setImagenPrincipal($req);
            break;
        }
    }

    /* 
    * Funcion que se encarga de eliminar una imágen
    * Parametros: nombre de la imagen
    * Return: 
    */
    public static function eliminaImagen(Request $req){
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


    public function setImagenPrincipal(Request $req){
        $nombreImg = $req->input('imagen');

        session_start();
        $prod = $_SESSION["currentProduct"];
        $idProd = producto::getNombreById($prod);
        $id = json_decode(json_encode($idProd), true);

        $imagenPrincipal = imagen::getPrincipal($id[0]['id']);

        $img = json_decode(json_encode($imagenPrincipal), true);

        $n = count($img);

        if ($n == '0') {
            imagen::editPrincipal($nombreImg, '1');
        }else{
            imagen::editPrincipal($img[0]['nombre'], '0');
            imagen::editPrincipal($nombreImg, '1');
        }

        return redirect()->back();
    }

    
    
}
