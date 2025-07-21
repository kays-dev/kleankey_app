<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Evite l'authentifié de retourner sur les pages de connexion et/ou d'inscription
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupère les guards existants dans le fichier 'config.auth.php'
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // Redirige l'authentifié selon le guard (soit 'web' soit 'admin')
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.logged');
                }
            }
        }
        return $next($request);
    }
}
