<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// php artisan make:controller --nome do contoller--
class MainController extends Controller
{   
    // retorna a view criada em resources
    public function index($value){
        return view('main', ['value' =>$value]);
    }
}
