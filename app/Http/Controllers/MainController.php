<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function editNote($id){
        
        $id = $this->decryptId($id);

        echo "Editando a nota com o id = $id ";
    }

    public function deleteNote($id){
        $id = $this->decryptId($id);

        echo "Deletando a nota com o id = $id ";
    }

    // Método privado do controlador Main, logo so está disponivel dentro do Main
    private function decryptId($id){
         // Tratamento de verififcação se o id esta encriptado
        try{
            // faz a descriptação
            $id = Crypt::decrypt($id);
        }catch(DecryptException $e){

            // Em caso de erro, redireciona a index
            return redirect()->route('index');
        }
        
        return $id;
    }
}
