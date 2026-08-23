<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
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

        // Mostra uma nova view de notas
        return view('new_note');
    }

    public function newNoteSubmit(Request $request){
        // Validação do request
        $request->validate(
            // Regras
            [
                // Verifica se há uma informação no campo
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            // Mensagens de erros
            [
                'text_title.required' => 'O titulo da nota é obrigatório',

                'text_tile.min' => 'O titulo deve ter pelo menos :min caracteres',

                'text_tile.max' => 'O titulo deve ter no máximo :max caracteres',

                'text_note.required' => 'A nota é obrigatório',

                'text_note.min' => 'A nota deve ter pelo menos :min caracteres',

                'text_note.max' => 'A nota deve ter no máximo :max caracteres'
            ]
        );
        // Get user id
        $id = session('user.id');
        // Criar uma nova nota

        $note = new Note();

        $note->user_id = $id;

        $note->title = $request->text_title;

        $note->text = $request->text_note;

        // Salva na base de dados
        $note->save();
        // Redirecionar ao home

        return redirect()->route('index');
        // echo 'Eu estou criando uma nova nota';
    }

    public function editNote($id){
        
        $id = $this->decryptId($id);

        // Carregar a nota

        // Encotra a nota com o id passado
        $note = Note::find($id);

        // Mostra a edição da nota view
        return view('edit_note', ['note' => $note]);

        echo "Editando a nota com o id = $id ";
    }

    public function editNoteSubmit(Request $request){
        // Validação do formulario
         $request->validate(
            // Regras
            [
                // Verifica se há uma informação no campo
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            // Mensagens de erros
            [
                'text_title.required' => 'O titulo da nota é obrigatório',

                'text_tile.min' => 'O titulo deve ter pelo menos :min caracteres',

                'text_tile.max' => 'O titulo deve ter no máximo :max caracteres',

                'text_note.required' => 'A nota é obrigatório',

                'text_note.min' => 'A nota deve ter pelo menos :min caracteres',

                'text_note.max' => 'A nota deve ter no máximo :max caracteres'
            ]
        );

        // Verifica se o id_note existe

        if(!$request->mpte_id == null){
            return redirect()->route('index');
        }
        // Decrypt note_id

        $id = Operations::decryptId($request->note_id);

        if ($id === null){
            return redirect()->route('index');
        }

        // Carregamento da note
        $note = Note::find($id);

        // Update note

        $note->title = $request->text_title;

        $note->text = $request->text_note;

        $note->save();
        // Redirecionamento a home

        return redirect()->route('index');
    }

    public function deleteNote($id){
        $id = $this->decryptId($id);

        // Carrega a nota

        $note = Note::find($id);

        // Mostra uma cofirmação de delete

        return view('delete_note', ['note' => $note]);
        // echo "Deletando a nota com o id = $id ";
    }

    public function deletNoteConfirm($id){
        // Verifiva se o id esta descriptografado
        $id = Operations::decryptId($id);

        if ($id === null){
            return redirect()->route('index');
        }
        
        // Carrega a note

        $note = Note::find($id);

        // 1. hard delete -> Significa que o registro vai ser removido do banco

        $note->delete();

        // 2. soft delete -> remove apenas da pagina, porém ainda existe no banco

        // $note->deleted_at = date('Y:m:d H:i:s');
        // $note->save();

        // Ao fazer isso, devemos deixar o método de carregamento das notas desse jeito:
        // $note = User::find($id)->notes()->whereNull->get()->toArray();

        // Redireciona a home

        return redirect()->route('index');
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
