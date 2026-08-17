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

        // Pega o id retornando um array com suas informações
        $user = User::find($id)->toArray();

        // pega as notas dele com base no id e retonar um array das notas
        $notes = User::find($id)->notes()->get()->toArray();

        echo'<pre>';
        print_r($user);
        print_r($notes);

        die();

        // mostra a view home

        return view('home');
    }

    public function newNote(){
        echo 'Cria notas';
    }
}
