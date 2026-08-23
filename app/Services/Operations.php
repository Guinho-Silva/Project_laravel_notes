<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;

use Illuminate\Support\Facades\Crypt;

// Criando uma classe global de descriptação para que outros componentes do sistema possa usar
class Operations{
    public static function decryptId($value){
        try{
            // faz a descriptação
            $value = Crypt::decrypt($value);
        }catch(DecryptException $e){

            // Em caso de erro, redireciona a index
            return redirect()->route('index');
        }
        
        return $value;
    }
}


?>