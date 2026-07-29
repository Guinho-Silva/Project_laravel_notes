<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticaContrller extends Controller
{
    // Método para carregar a view de login
    public function login(){
        return view('login');
    }

    // Pega todas as informações subimetidas pelo formulario
    public function loginSubmit(Request $request){
        echo 'loginSubmit';
    }

    // Método para carregar a view de login
    public function logoff(){
        echo 'logoff';
    }
}
