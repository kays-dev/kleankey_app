<?php

namespace App\Http\Controllers\User\Agent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Http\Controllers\Controller;

class AgentServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function planning()
    {
        $user = Auth::guard('web')->user();

        $services = Service::where('agent_id', $user->agent)->firstOrFail();

        $pagination = $services->paginate(15);

        return view('user.agent.services.index', compact('user', 'services', 'pagination'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        $agent = $service->agent;
        $estates = $service->estates;

        return view('user.agent.services.show', compact('estates', 'agent', 'service'));
    }
}
