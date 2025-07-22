<?php

namespace App\Http\Middleware\User\Owner;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessToOwnerOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupération du User authentifié
        $user = Auth::guard('web')->user();

        // Vérifie que le User a un rôle 'owner'
        if (!$user || $user->role !== 'owner') {
            abort(403, 'Vous n\' êtes pas autorisé à accèder à cette ressource');
        }
        return $next($request);
    }
}
