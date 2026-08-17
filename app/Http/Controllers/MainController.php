<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// php artisan make:controller --nome do contoller--
class MainController extends Controller
{   
    public function index(){
        // echo "Estou no APP";
        // carrega as notas dos usuarios

        // Pega o usuario logado na sessaõ
        $id= session('user.id');


        // pega as notas dele com base no id e retonar um array das notas
        $notes = User::find($id)->notes()->get()->toArray();

        // mostra a view home

        return view('home', ['notes' => $notes]);
    }

    public function newNote(){
        echo 'Cria notas';
    }
}
