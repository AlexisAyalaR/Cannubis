<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\usuario;

use Alert;


class UsuarioController extends Controller
{
    function load_product_page(){
    	return view('usuario');
    }

    function load_usuarioAdmin(){
        return view('usuarioAdmin');
    }


    /* 
    * Funcion que se encarga de registrar un producto
    * Parametros: Request->POST
    * Return:
    */
	public function registraUsuario(Request $req){
		//FALTA VALIDAR QUE LOS DATOS SI SEAN DE LO QUE SE PIDE
        $usuarioN = new usuario();

        $usuarioN->usuario = $req->input('Usuario');
        $usuarioN->email = $req->input('Email');
        $usuarioN->contraseña = $req->input('Pass');
        $usuarioN->tipo = "1";

    	try{
            $usuarioN->save();

    	}catch(\Exception $e){
    		\Log::info('Error getInfo: '.$e);
            return redirect()->back();
    	}
        Alert::success('Alta realizada', 'Usuario agregado');
        return redirect()->back();
    }

    /* 
    * Funcion que se encarga de eliminar un producto
    * Parametros: Request->POST
    * Return:
    */
    public function eliminaUsuario(Request $req){

        //VALIDADO
        $email = $_POST['emailActual'];

        if($email == ''){
            session(['eliminaUsuario' => -1]);
            return redirect()->back();
        }

        try{
            $id = usuario::eliminaUsuario($email);

        }catch(Exception $e){
            \Log::info('Error getInfo: '.$e);
            session(['eliminaUsuario' => -1]);
            return redirect()->back();

        }
        session(['eliminaUsuario' => 1]);

        return redirect()->back()->with('alert', 'Deleted!');
    }

    /* 
    * Funcion que se encarga de regresar nombres de productos
    * Parametros: 
    * Return: JSON nombresProd
    */
    public function cargaEmailsUsuarios(){
    	$emails = usuario::getEmailsUsuarios();
    	return \Response::json(["emails" => $emails], 200);
    }


}