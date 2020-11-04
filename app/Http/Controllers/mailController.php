<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Duda; 

class mailController extends Controller
{
    /* 
    * Funcion que se encarga de mandar el mail con las dudas
    * Parametros: Request->POST
    * Return:
    */
    public function envia(Request $req){

    	$telf = $req->input('tel');
    	$mail = $req->input('email');
    	$desc = $req->input('esp');

        if($desc != '' & ($mail != '' || $telf != '')){
            Mail::send(new Duda($req));
        }
    	
    	return redirect()->back();
  	}
}
