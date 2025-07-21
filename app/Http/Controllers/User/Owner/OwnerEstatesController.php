<?php

namespace App\Http\Controllers\User\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerEstatesController extends Controller
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
     * Display the specified resource.
     */
    public function show(string $estateCode)
    {
        $estate = Estate::where('estate_code', $estateCode)->firstOrFail();
        $owner = $estate->owner;
        $zone = $estate->zone;
        $agents = $estate->agents;
        $services = $estate->services;

        return view('estates.show', compact('estate', 'owner', 'zone', 'agents', 'services'));
    }
}
