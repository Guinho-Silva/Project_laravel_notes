<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// php artisan make:controller --nome do contoller--
class MainController extends Controller
{
    public function index(){
        echo "Hello Controller";
    }
}
