<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckisNotLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuario não esta logado, se estiver logado redireciona para a rota home, sem a necessidade de fazer o login novamente
        
        if(session('user')){
            return redirect('/');
        }

        return $next($request);
    }
}
