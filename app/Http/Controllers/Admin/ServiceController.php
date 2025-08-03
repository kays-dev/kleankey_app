<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ServiceType;
use App\Models\Agent;
use App\Models\Estate;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $services = Service::paginate(15);

        return view('admin.services.index', compact('services', 'admin'));
    }

    public function create()
    {
        $admin = Auth::guard('admin')->user();
        $services = Service::all();
        $types = ServiceType::cases();
        $agents = Agent::all();
        $estates = Estate::all();

        return view('admin.services.create', compact('services', 'types', 'agents', 'estates', 'admin'));
    }

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

        try {
            $service = Service::create([
                'service_name' => $request->input('name'),
                'service_type' => $request->input('type'),
                'description' => $request->input('description'),
                'duration' => $request->input('duration'),
                'agent_id' => $request->input('agent'),
            ]);

            $service->estates()->attach($request->input('estates'));

            return redirect(route('services.create'))->with('success', 'Prestation ' . $service->service_name . ' créée !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $service = Service::findOrFail($id);
        $agent = $service->agent;
        $estates = $service->estates;

        return view('admin.services.show', compact('estates', 'agent', 'service', 'admin'));
    }

    public function edit(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $service = Service::findOrFail($id);
        $types = ServiceType::cases();
        $agents = Agent::all();
        $estates = Estate::all();

        return view('admin.services.edit', compact('service', 'types', 'agents', 'estates', 'admin'));
    }

    public function update(Request $request, string $id)
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

        try {
            $service = Service::findOrFail($id);

            $service->update([
                'service_name' => $request->input('name'),
                'service_type' => $request->input('type'),
                'description' => $request->input('description'),
                'duration' => $request->input('duration'),
                'agent_id' => $request->input('agent'),
            ]);

            $service->estates()->sync($request->input('estates'));

            return redirect(route('services.show', $service->service_id))->with('success', 'Prestation ' . $service->service_name . ' modifiée !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la modification : ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return redirect(route('services.index'))->with('success', 'Prestation supprimée');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}