<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticaContrller extends Controller
{
    // Método para carregar a view de login
    public function login(){
        return view('login');
    }

    // Método para carregar a view de login
    public function logoff(){
        echo 'logoff';
    }
}
