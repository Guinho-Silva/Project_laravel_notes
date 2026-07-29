<?php

// Importação do controller main

use App\Http\Controllers\AutenticaContrller;
use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Route;

// Rotas de autenticação
Route::get('/login', [AutenticaContrller::class,'login']);

Route::post('/loginSubmit', [AutenticaContrller::class,'loginSubmit']);


Route::get('/logoff', [AutenticaContrller::class,'logoff']);