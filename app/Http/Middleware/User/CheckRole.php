<?php

namespace App\Http\Middleware\User;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupération du User authentifié
        $user= Auth::guard('web')->user();

        // Récupère tous les rôles existants dans l'enum
        $roles= Role::cases();

        // Vérifie que le User a un rôle
        if(!$user || !in_array($user->role, $roles)){
            abort(403, 'Accès refusé');
        }

        return $next($request);
    }
}
