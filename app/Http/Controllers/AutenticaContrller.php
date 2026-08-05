<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $username = $request->input('text_username');

        $password = $request->input('text_password');
        
        // Pega todos os usuarios do BD

        $users = User::all()->toArray();

        // echo '<pre>';
        // print_r($users);
        // echo '</pre>';

        
        // teste dos dados que estão sendo passado por impossivel
        // echo $request->input('text_username');
        // echo '<br>';
        // echo $request->input('text_password');

        // Checar se o usuario existe

        $user = User::where('username', $username)->where('deleted_at', NULL)->first();

        if(!$user){
            return redirect()
                    ->back() //Volta a pagina em caso de Erro
                    ->withInput() // Mantém os dados do formulário
                    ->with('LoginErro', 'Usuario ou senha inválidos');//Adiciona uma mensagem de erro
        }

        // Verifica Senha

        if(!password_verify($password,$user->password)){
            return redirect()
                    ->back() //Volta a pagina em caso de Erro
                    ->withInput() // Mantém os dados do formulário
                    ->with('LoginErro', 'Usuario ou senha inválidos');//Adiciona uma mensagem de erro

        }

        // Update do campode last_login no banco de dados

        $user->last_login=date('Y-m-d H:i:s');
        // Faz o save do usuario no banco de dados
        $user->save();

        // Login user

        session([
            'user'=>[
                'id'=>$user->id,
                'username'=>$user->username
            ]
        ]);

        echo 'Login com Sucesso';
        //print_r($user);
        //echo '</pre>';
    }

    // Método para carregar a view de login
    public function logoff(){
    //    Logout da aplicação

        // Limpa a sessão passando a chave de identificação
        session()->forget('user');

        // Redireciona para a pagina de login
        return redirect()->to('/login');
    }
}
