<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// php artisan make:controller --nome do contoller--
class MainController extends Controller
{   
    public function index(){
        // echo "Estou no APP";
        // carrega as notas dos usuarios

        // mostra a view home

        return view('home');
    }

    public function newNote(){
        echo 'Cria notas';
    }
}
