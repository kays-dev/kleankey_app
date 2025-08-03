<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enums\EstateType;
use App\Models\Agent;
use App\Models\Estate;
use App\Models\Owner;
use App\Models\Service;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $estates = Estate::paginate(15);

        return view('admin.estates.index', compact('estates', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        $zones = Zone::all();
        $types = EstateType::cases();
        $agents = Agent::all();
        $owners = Owner::all();
        $services = Service::all();

        return view('admin.estates.create', compact('zones', 'types', 'agents', 'owners', 'services', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'owner' => 'required|string',
                'address' => 'required|string',
                'zone' => 'required|string|exists:zones,zone_id',
                'type' => ['required', 'string', Rule::in(array_column(EstateType::cases(), 'value'))],
                'rooms' => 'required|string',
                'surface' => 'required|decimal:8,2|min:10',
                'agents' => 'nullable|array',
                'agents.*' => 'exists:agents,agent_id',
                'services' => 'nullable|array',
                'services.*' => 'exists:services,service_id',
            ]);

            $estate = Estate::create([
                'owner_id' => $request->input('owner'),
                'estate_address' => $request->input('address'),
                'zone_id' => $request->input('zone'),
                'estate_type' => $request->input('type'),
                'rooms_number' => $request->input('rooms'),
                'surface' => $request->input('surface'),
            ]);

            $estate->agents()->attach($request->input('agents', []));
            $estate->services()->attach($request->input('services', []));

            return redirect(route('estates.create'))->with('success', 'Bien ' . $estate->estate_code . ' créé !');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $estateCode)
    {
        $admin = Auth::guard('admin')->user();
        $estate = Estate::where('estate_code', $estateCode)->firstOrFail();
        $owner = $estate->owner;
        $zone = $estate->zone;
        $agents = $estate->agents;
        $services = $estate->services;

        return view('admin.estates.show', compact('estate', 'owner', 'zone', 'agents', 'services', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $estateCode)
    {
        $admin = Auth::guard('admin')->user();
        $estate = Estate::where('estate_code', $estateCode)->firstOrFail();
        $zones = Zone::all();
        $types = EstateType::cases();
        $agents = Agent::all();
        $owners = Owner::all();
        $services = Service::all();


        return view('admin.estates.edit', compact('estate', 'zones', 'types', 'agents', 'owners', 'services', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $estateCode)
    {
        try {
            $estate = Estate::where('estate_code', $estateCode)->firstOrFail();

            $request->validate([
                'owner' => 'required|string',
                'address' => 'required|string',
                'zone' => 'required|string|exists:zones,zone_id',
                'type' => ['required', 'string', Rule::in(array_column(EstateType::cases(), 'value'))],
                'rooms' => 'required|string',
                'surface' => 'required|decimal:8,2',
                'agents' => 'nullable|array',
                'agents.*' => 'exists:agents,agent_id',
                'services' => 'nullable|array',
                'services.*' => 'exists:services,service_id',
            ]);

            $estate->update([
                'owner_id' => $request->input('owner'),
                'estate_address' => $request->input('address'),
                'zone_id' => $request->input('zone'),
                'estate_type' => $request->input('type'),
                'rooms_number' => $request->input('rooms'),
                'surface' => $request->input('surface'),
            ]);

            $estate->agents()->sync($request->input('agents', []));
            $estate->services()->sync($request->input('services', []));

            return redirect(route('estates.show', $estate->estate_code))->with('success', 'Bien ' . $estate->estate_code . ' modifié !');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur lors de la modification : ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $estateCode)
    {
        try {
            $estate = Estate::where('estate_code', $estateCode)->firstOrFail();
            $estate->delete();

            return redirect(route('estates.index'))->with('success', 'Bien supprimé');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}
