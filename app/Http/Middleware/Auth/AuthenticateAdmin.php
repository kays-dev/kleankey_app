<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Vérifie que l'utilisateur est authentifié en tant qu'admin, sinon, il est redirigé vers la vue de login
        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
        }

        // Si l'utilisateur est bien un Admin, il passe à la prochaine requête
        return $next($request);
    }
}
