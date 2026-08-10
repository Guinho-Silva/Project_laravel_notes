<?php

// Importação do controller main

use App\Http\Controllers\AutenticaContrller;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckLogged;

use App\Http\Middleware\CheckisNotLogged;

use Illuminate\Support\Facades\Route;


// Rotas de verificação de user não logado
Route::middleware([CheckisNotLogged::class])->group(function(){
    // Rotas de autenticação
    Route::get('/login', [AutenticaContrller::class,'login']);

    // Rota após login
    Route::post('/loginSubmit', [AutenticaContrller::class,'loginSubmit']);
    
});

// Etapas do Middleware
Route::middleware([CheckLogged::class])->group(function(){
    // Rota da index principal
    Route::get('/',[MainController::class,'index'])->name('index'); // Com o name, posso atribuir os nomes das rotas

    // Rota da criação de notas
    Route::get('/newNote',[MainController::class,'newNote'])->name('cria_nota');

    // Rota de logout
    Route::get('/logoff', [AutenticaContrller::class,'logoff'])->name('logout');
});