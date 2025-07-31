<?php

namespace App\Http\Controllers\User\Agent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\Agent;

class AgentServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function planning()
    {
        $user = Auth::guard('web')->user();
        $agent = Agent::where('user_id', $user->user_id)->firstOrFail();

        $services = Service::where('agent_id', $agent->agent_id)->paginate(15);
        // dd($services);

        return view('user.agents.services.index', compact('user', 'services'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::guard('web')->user();
        $service = Service::findOrFail($id);
        $agent = $service->agent;
        $estates = $service->estates;

        return view('user.agents.services.show', compact('user','estates', 'agent', 'service'));
    }
}
