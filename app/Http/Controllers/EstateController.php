<?php

namespace App\Http\Controllers;

use App\Enums\EstateType;
use App\Models\Agent;
use App\Models\Estate;
use App\Models\Owner;
use App\Models\Service;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estates = Estate::all();
        $pagination = Estate::paginate(15);

        return view('estates.index', compact('estates', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zones = Zone::all();
        $types = EstateType::cases();
        $agents = Agent::all();
        $owners= Owner::all();
        $services= Service::all();

        return view('estates.create', compact('zones', 'types', 'agents', 'owners', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner' => 'required|string',
            'address' => 'required|string',
            'zone' => 'required|string|exists:zones,zone_id',
            'type' => ['required','string', Rule::in(array_column(EstateType::cases(), 'value'))],
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

        $estate->agents()->attach($request->input('agents'));
        $estate->services()->attach($request->input('services'));

        return redirect(route('estates.create'))->with('success', 'Bien ' . $estate->estate_code . ' créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $estateCode)
    {
        $estate = Estate::where('estate_code',$estateCode)->firstOrFail();
        $owner = $estate->owner;
        $zone = $estate->zone;
        $agents = $estate->agents;
        $services = $estate->services;

        return view('estates.show', compact('owner', 'zone', 'agents', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $estateCode)
    {
        $estate = Estate::where('estate_code',$estateCode)->firstOrFail();
        $zones = Zone::all();
        $types = EstateType::cases();
        $agents = Agent::all();
        $owners= Owner::all();
        $services= Service::all();

        
        return view('estates.edit', compact('estate', 'zones', 'types', 'agents', 'owners', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $estateCode)
    {
        $estate = Estate::where('estate_code',$estateCode)->firstOrFail();

        $request->validate([
            'owner' => 'required|string',
            'address' => 'required|string',
            'zone' => 'required|string|exists:zones,zone_id',
            'type' => ['required','string', Rule::in(array_column(EstateType::cases(), 'value'))],
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

        $estate->agents()->sync($request->input('agents'));
        $estate->services()->sync($request->input('services'));

        return redirect(route('estates.show', $estate->estate_code))->with('success', 'Bien ' . $estate->estate_code . ' modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $estateCode)
    {
        $estate = Estate::where('estate_code',$estateCode)->firstOrFail();

        $estate->delete();

        return redirect(route('estates.index'))->with('success', 'Bien supprimé');
    }
}
