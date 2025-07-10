<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents=Agent::all();
        $pagination=Agent::paginate(15);

        return view('agents.index', compact('agents', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones= Zone::all();
        
        return view('agents.create', compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lname'=> 'required|string',
            'fname'=> 'required|string',
            'address'=> 'required|string',
            'email'=> 'required|email',
            'phone'=> 'required|string',
            'zone'=> 'required|string|exists:zones,zone_id',
        ]);

        $agent = Agent::create([
            'agent_name'=> strtoupper($request->input('lname')),
            'agent_surname'=> $request->input('fname'),
            'agent_address'=> strtoupper($request->input('address')),
            'agent_mail'=> $request->input('email'),
            'agent_tel'=> $request->input('phone'),
            'zone_id'=> $request->input('zone'),
        ]);

        return redirect(route('agents.create'))->with('success', 'Prestataire ' . $agent->agent_surname . ' ' . $agent->agent_name . ' créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agent = Agent::findOrFail($id);
        $estates = $agent->estates;
        $zone = $agent->zone;

        return view('agents.show', compact('agent','estates','zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agent= Agent::findOrFail($id);
        $zones= Zone::all();
        $estates= $agent->estates;
        
        return view('agents.edit', compact('zones','agent','estates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agent= Agent::findOrFail($id);
        
        $request->validate([
            'lname'=> 'required|string',
            'fname'=> 'required|string',
            'address'=> 'required|string',
            'email'=> 'required|email:rcf,dns',
            'phone'=> 'required|string',
            'zone'=> 'required|string|exists:zones,zone_id'
        ]);

        $agent->update([
            'agent_name'=> strtoupper($request->input('lname')),
            'agent_surname'=> $request->input('fname'),
            'agent_address'=> strtoupper($request->input('address')),
            'agent_mail'=> $request->input('email'),
            'agent_tel'=> $request->input('phone'),
            'zone_id'=> $request->input('zone'),
        ]);

        return redirect(route('agents.show',$agent->agent_id))->with('success', 'Prestataire '. $agent->agent_surname .' ' . $agent->agent_name . ' modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agent= Agent::findOrFail($id);

        $agent->delete();

        return redirect(route('agents.index'))->with('success', 'Prestataire supprimé');
    }
}
