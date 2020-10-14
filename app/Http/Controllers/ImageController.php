<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagen;

class ImageController extends Controller
{
    public function registraImagen(Request $req) {

    	$imagen = new imagen();

    	if ($req -> hasfile('image')) {
    		$file = $req->file('image');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . "." . $extension;
    		$path = public_path('img');
    		$file -> move($path, $filename);
    		$imagen ->nombre = $filename;
    	}else{
    		return $req;
    		$imagen ->nombre = '';
    	}
    	$imagen->save();

    	return redirect()->back();
    }

    public function viewUploads () {
        $images = File::all();
        return view('view_uploads')->with('images', $images);
    }
}
