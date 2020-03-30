<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailchimp;

class EmailController extends Controller
{
    public function EnviarCorreo(){

    	$idList = '7d94861acd';
    	$email  = 'pancho@gmail.com';

    	if (Mailchimp::check($idList, $email)) {
    		return "¡El email: <strong>{$email}</strong> ya se encuentra registrado!";
    	}else{

    		Mailchimp::subscribe(
	    		$idList, //$listId
	    		$email, //$emailAddress
	    		['FNAME' => 'Pancho', 'LNAME' => 'Lopez'], //$merge = [] aqui puede ir el nombre y apellido
	    		false //$confirm =
	    	);

	    	return "¡Email agregado correctamente!";
    	}
    }
}
