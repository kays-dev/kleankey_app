<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $zones = Zone::paginate(15);

        return view('admin.zones.index', compact('zones', 'user', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.zones.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|alpha_num',
        ]);

        try {
            $zone = Zone::create([
                'zone_name' => mb_strtoupper($request->input('name'), 'UTF-8'),
            ]);

            return redirect(route('zones.create'))->with('success', 'Secteur ' . $zone->zone_name . ' créé !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la création du secteur : ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $zone = Zone::findOrFail($id);
        $cities = $zone->cities;
        $estates = $zone->estates;
        $agents = $zone->agents;

        return view('admin.zones.show', compact('zone', 'cities', 'estates', 'agents', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Auth::guard('admin')->user();
        $zone = Zone::findOrFail($id);

        return view('admin.zones.edit', compact('zone', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|alpha_num',
        ]);

        try {
            $zone = Zone::findOrFail($id);

            $zone->update([
                'zone_name' => mb_strtoupper($request->input('name'), 'UTF-8'),
            ]);

            return redirect(route('zones.show', $zone->zone_id))->with('success', 'Secteur ' . $zone->zone_name . ' modifié !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $zone = Zone::findOrFail($id);
            $zone->delete();

            return redirect(route('zones.index'))->with('success', 'Secteur supprimé');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}
