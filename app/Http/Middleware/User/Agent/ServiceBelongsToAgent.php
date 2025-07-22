<?php

namespace App\Http\Middleware\User\Agent;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use Symfony\Component\HttpFoundation\Response;

class ServiceBelongsToAgent
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
        $serviceId = $request->route('service');

        // Récupération de l'Agent associé au User authentifié
        $agent = Agent::where('user_id', $user->user_id)->first();

        // Vérifie que le service est lié à l'Agent authentifié
        if (!$agent || !$agent->services->contains('service_id', $serviceId)) {
            abort(403, 'Vous ne pouvez pas accèder à cette prestation');
        }
        return $next($request);
    }
}
