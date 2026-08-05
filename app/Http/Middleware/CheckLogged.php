<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // Verifica se o User esta logado
        if(!session('user')){
            // Redireciona a pagina de login
            return redirect('/login');
        }
        return $next($request);
    }
}
