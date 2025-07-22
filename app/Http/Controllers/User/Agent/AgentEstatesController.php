<?php

namespace App\Http\Controllers\User\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Estate;
use Illuminate\Support\Facades\Auth;

class AgentEstatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managing()
    {
        $user = Auth::guard('web')->user();
        $agent = Agent::where('agent_id', $user->agent)->firstOrFail();

        $estates = $agent->estates;
        
        $pagination = $estates->paginate(15);

        return view('user.agent.estates.index', compact('user', 'estates', 'pagination'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $estateCode)
    {
        $user = Auth::guard('web')->user();

        $estate = Estate::where('estate_code', $estateCode)->firstOrFail();
        $owner = $estate->owner;
        $zone = $estate->zone;
        $services = $estate->services;

        return view('user.agent.estates.show', compact('user','estate', 'owner', 'zone', 'services'));
    }
}
