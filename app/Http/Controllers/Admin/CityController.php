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
        $admin = Auth::guard('admin')->user();
        $cities = City::paginate(15);

        return view('admin.cities.index', compact('cities', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        $zones = Zone::all();

        return view('admin.cities.create', compact('zones', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'postcode' => 'required|string',
                'region' => 'required|string',
                'zone' => 'nullable|string|exists:zones,zone_id',
            ]);

            $city = City::create([
                'city_name' => mb_strtoupper($request->input('name'), 'UTF-8'),
                'postcode' => $request->input('postcode'),
                'region' => $request->input('region'),
                'zone_id' => $request->input('zone'),
            ]);

            return redirect(route('cities.create'))->with('success', 'Ville ' . $city->city_name . ' créée !');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de la création : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cityCode)
    {
        $admin = Auth::guard('admin')->user();
        $city = City::where('city_code', $cityCode)->firstOrFail();
        $zone = $city->zone;

        return view('admin.cities.show', compact('city', 'zone', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cityCode)
    {
        $admin = Auth::guard('admin')->user();
        $city = City::where('city_code', $cityCode)->firstOrFail();
        $zones = Zone::all();

        return view('admin.cities.edit', compact('zones', 'city', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cityCode)
    {
        try {
            $city = City::where('city_code', $cityCode)->firstOrFail();

            $request->validate([
                'name' => 'required|string',
                'postcode' => 'required|string',
                'region' => 'required|string',
                'zone' => 'nullable|string|exists:zones,zone_id',
            ]);

            $city->update([
                'city_name' =>  mb_strtoupper($request->input('name'), 'UTF-8'),
                'postcode' => $request->input('postcode'),
                'region' => $request->input('region'),
                'zone_id' => $request->input('zone'),
            ]);

            return redirect(route('cities.show', $city->city_code))->with('success', 'Ville ' . $city->city_name . ' modifiée !');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue lors de la modification : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cityCode)
    {
        try {
            $city = City::where('city_code', $cityCode)->firstOrFail();
            $cityName = $city->city_name;

            $city->delete();

            return redirect(route('cities.index'))->with('success', 'Ville ' . $cityName . ' supprimée');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression : ' . $e->getMessage());
        }
    }
}
