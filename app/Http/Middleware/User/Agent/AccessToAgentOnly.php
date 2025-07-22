<?php

namespace App\Http\Middleware\User\Agent;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessToAgentOnly
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

        // Vérifie que le User a un rôle 'agent'
        if(!$user || $user->role !== 'agent'){
            abort(403, 'Vous n\' êtes pas autorisé à accèder à cette ressource');
        }

        return $next($request);
    }
}
