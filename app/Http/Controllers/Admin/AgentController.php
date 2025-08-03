<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $agents = Agent::paginate(15);

        return view('admin.agents.index', compact('agents', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        $zones = Zone::all();

        return view('admin.agents.create', compact('zones', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'lname' => 'required|string',
                'fname' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'zone' => 'nullable|string|exists:zones,zone_id',
            ]);

            $agent = Agent::create([
                'agent_name' => mb_strtoupper($request->input('lname'), 'UTF-8'),
                'agent_surname' => $request->input('fname'),
                'agent_address' => mb_strtoupper($request->input('address'), 'UTF-8'),
                'agent_mail' => $request->input('email'),
                'agent_tel' => $request->input('phone'),
                'zone_id' => $request->input('zone'),
            ]);

            return redirect(route('agents.create'))->with('success', 'Prestataire ' . $agent->agent_surname . ' ' . $agent->agent_name . ' créé !');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de la création : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $agent = Agent::findOrFail($id);
        $estates = $agent->estates;
        $zone = $agent->zone;

        return view('admin.agents.show', compact('agent', 'estates', 'zone', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $agent = Agent::findOrFail($id);
        $zones = Zone::all();
        $estates = $agent->estates;

        return view('admin.agents.edit', compact('zones', 'agent', 'estates', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $agent = Agent::findOrFail($id);

            $request->validate([
                'lname' => 'required|string',
                'fname' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'zone' => 'nullable|string|exists:zones,zone_id'
            ]);

            $agent->update([
                'agent_name' => mb_strtoupper($request->input('lname'), 'UTF-8'),
                'agent_surname' => $request->input('fname'),
                'agent_address' => mb_strtoupper($request->input('address'), 'UTF-8'),
                'agent_mail' => $request->input('email'),
                'agent_tel' => $request->input('phone'),
                'zone_id' => $request->input('zone'),
            ]);

            return redirect(route('agents.show', $agent->agent_id))->with('success', 'Prestataire ' . $agent->agent_surname . ' ' . $agent->agent_name . ' modifié');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de la modification : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $agent = Agent::findOrFail($id);
            $agent->delete();

            return redirect(route('agents.index'))->with('success', 'Prestataire supprimé');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression : ' . $e->getMessage());
        }
    }
}
