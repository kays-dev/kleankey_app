<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $cities = City::paginate(15);

        return view('admin.cities.index', compact('cities', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::guard('web')->user();
        $zones = Zone::all();

        return view('admin.cities.create', compact('zones', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'postcode' => 'required|string',
            'region' => 'required|string',
            'zone' => 'nullable|string|exists:zones,zone_id',
        ]);

        $city = City::create([
            'city_name' => mb_strtoupper(($request->input('name')), 'UTF-8'),
            'postcode' => $request->input('postcode'),
            'region' => $request->input('region'),
            'zone_id' => $request->input('zone'),
        ]);

        return redirect(route('cities.create'))->with('success', 'Ville ' . $city->city_name . ' créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cityCode)
    {
        $user = Auth::guard('web')->user();
        $city = City::where('city_code', $cityCode)->firstOrFail();
        $zone = $city->zone;

        return view('admin.cities.show', compact('city', 'zone', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cityCode)
    {
        $user = Auth::guard('web')->user();
        $city = City::where('city_code', $cityCode)->firstOrFail();
        $zones = Zone::all();

        return view('admin.cities.edit', compact('zones', 'city', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cityCode)
    {
        $city = City::where('city_code', $cityCode)->firstOrFail();

        $request->validate([
            'name' => 'required|string',
            'postcode' => 'required|string',
            'region' => 'required|string',
            'zone' => 'nullable|string|exists:zones,zone_id',
        ]);

        $city->update([
            'city_name' =>  mb_strtoupper(($request->input('name')), 'UTF-8'),
            'postcode' => $request->input('postcode'),
            'region' => $request->input('region'),
            'zone_id' => $request->input('zone'),
        ]);

        return redirect(route('cities.show', $city->city_code))->with('success', 'Ville ' . $city->city_name . ' modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cityCode)
    {
        $city = City::where('city_code', $cityCode)->firstOrFail();

        $city->delete();

        return redirect(route('cities.index'))->with('success', 'Ville ' . $city->city_name . ' supprimée');
    }
}
