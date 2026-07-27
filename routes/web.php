<?php

// Importação do controller main
use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    echo 'Hello World!';
});


Route::get('/about', function(){
    echo 'About us';
});

// Método criado dentro do controllador main

// // buscando um valor da url atraves do value que é uma variavel
Route::get('/main/{value}',[MainController::class, 'index']);