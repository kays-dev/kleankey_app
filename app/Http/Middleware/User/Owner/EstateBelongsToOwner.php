<?php

namespace App\Http\Middleware\User\Owner;

use App\Models\Owner;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstateBelongsToOwner
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

        // Récupération de l'Owner associé au User authentifié
        $owner = Owner::where('user_id', $user->user_id)->first();

        // Vérifie que l'estate est lié à l'Owner authentifié
        if (!$owner || !$owner->estates->contains('estate_code', $estateCode)) {
            abort(403, 'Vous ne pouvez pas accèder à ce bien');
        }
        return $next($request);
    }
}
