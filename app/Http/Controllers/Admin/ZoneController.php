<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $zones=Zone::all();
        $pagination=Zone::paginate(15);

        return view('zones.index', compact('zones', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string:alpha_num',
        ]);

        $zone = Zone::create([
            'zone_name'=> mb_strtoupper($request->input('name'), 'UTF-8'),
        ]);

        return redirect(route('zones.create'))->with('success', 'Secteur ' . $zone->zone_name . ' créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zone = Zone::findOrFail($id);
        $cities = $zone->cities;
        $estates = $zone->estates;
        $agents = $zone->agents;

        return view('zones.show', compact('zone','cities','estates','agents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $zone= Zone::findOrFail($id);
        
        return view('zones.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $zone= Zone::findOrFail($id);

        $request->validate([
            'name'=> 'required|string:alpha_num',
        ]);

        $zone->update([
            'zone_name'=> mb_strtoupper($request->input('name'), 'UTF-8'),
        ]);

        return redirect(route('zones.show', $zone->zone_id))->with('success', 'Secteur ' . $zone->zone_name . ' modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zone= Zone::findOrFail($id);

        $zone->delete();

        return redirect(route('zones.index'))->with('success', 'Secteur supprimé');
    }
}
