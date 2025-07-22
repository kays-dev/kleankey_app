<?php

namespace App\Http\Middleware\User\Agent;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstateHasThisAgent
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

        // Récupération de l'objet à vérifier
        $estateCode = $request->route('estate');

        // Récupération de l'Agent associé au User authentifié
        $agent = Agent::where('user_id', $user->user_id)->first();

        // Vérifie que l'estate est lié à l'Agent authentifié
        if (!$agent || !$agent->estates->contains('estate_code', $estateCode)) {
            abort(403, 'Vous ne pouvez pas accèder à ce bien');
        }
        return $next($request);
    }
}
