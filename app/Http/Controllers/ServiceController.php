<?php

namespace App\Http\Controllers;

use App\Enums\ServiceType;
use App\Models\Agent;
use App\Models\Estate;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        $pagination = Service::paginate(15);

        return view('services.index', compact('services', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $types = ServiceType::cases();
        $agents = Agent::all();
        $estates = Estate::all();

        return view('services.create', compact('services', 'types', 'agents', 'estates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => ['required', 'string', Rule::in(array_column(ServiceType::cases(), 'value'))],
            'description' => 'nullable|string',
            'duration' => 'nullable|date_format:H:i',
            'agent' => 'nullable|exists:agents,agent_id',
            'estates' => 'nullable|array',
            'estates.*' => 'exists:estates,estate_id',
        ]);

        $service = Service::create([
            'service_name' => $request->input('name'),
            'service_type' => $request->input('type'),
            'description' => $request->input('description'),
            'duration' => $request->input('duration'),
            'agent_id' => $request->input('agent'),
        ]);

        $service->estates()->attach($request->input('estates'));

        return redirect(route('services.create'))->with('success', 'Prestation ' . $service->service_name . ' créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        $agent = $service->agent;
        $estates = $service->estates;

        return view('services.show', compact('estates', 'agent', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service= Service::findOrFail($id);
        $types = ServiceType::cases();
        $agents = Agent::all();
        $estates = Estate::all();

        return view('services.edit', compact('service', 'types', 'agents', 'estates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service= Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'type' => ['required', 'string', Rule::in(array_column(ServiceType::cases(), 'value'))],
            'description' => 'nullable|string',
            'duration' => 'nullable|date_format:H:i',
            'agent' => 'nullable|exists:agents,agent_id',
            'estates' => 'nullable|array',
            'estates.*' => 'exists:estates,estate_id',
        ]);

        $service->update([
            'service_name' => $request->input('name'),
            'service_type' => $request->input('type'),
            'description' => $request->input('description'),
            'duration' => $request->input('duration'),
            'agent_id' => $request->input('agent'),
        ]);

        $service->estates()->sync($request->input('estates'));

        return redirect(route('services.show', $service->service_id))->with('success', 'Prestation ' . $service->service_name . ' modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service= Service::findOrFail($id);

        $service->delete();

        return redirect(route('services.index'))->with('success', 'Prestation supprimée');
    }
}
