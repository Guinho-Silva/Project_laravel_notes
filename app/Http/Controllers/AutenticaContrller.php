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

        // validação do formulario pelo lado do servidor
        $request->validate(
            // Regras
            [
                // Verifica se há uma informação no campo
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            // Mensagens de erros
            [
                'text_username.required' => 'O nome de usuario é obrigatório',

                'text_username.email' => 'O usuario deve ser um email valido',

                'text_password.required' => 'A sennha é obrigatório',

                'text_password.min' => 'A senha deve ter pelo menos :min caracteres',

                'text_password.max' => 'A senha deve ter no máximo :max caracteres'
            ]
        );

        // get user input

        $username = $request->input('txt_username');

        $password = $request->input('txt_password');
        
        echo 'OK';

        // teste dos dados que estão sendo passado por impossivel
        // echo $request->input('text_username');
        // echo '<br>';
        // echo $request->input('text_password');
    }

    // Método para carregar a view de login
    public function logoff(){
        echo 'logoff';
    }
}
