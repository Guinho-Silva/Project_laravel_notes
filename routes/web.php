<?php

// Importação do controller main

use App\Http\Controllers\AutenticaContrller;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckLogged;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação
Route::get('/login', [AutenticaContrller::class,'login']);

// Rota após login
Route::post('/loginSubmit', [AutenticaContrller::class,'loginSubmit']);

// Etapas do Middleware
Route::middleware([CheckLogged::class])->group(function(){
    // Rota da index principal
    Route::get('/',[MainController::class,'index']);

    // Rota da criação de notas
    Route::get('/newNote',[MainController::class,'newNote']);

    // Rota de logout
    Route::get('/logoff', [AutenticaContrller::class,'logoff']);
});

