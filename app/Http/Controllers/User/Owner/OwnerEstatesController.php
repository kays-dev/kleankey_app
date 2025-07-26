<?php

namespace App\Http\Controllers\User\Owner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\Owner;

class OwnerEstatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $owner = Owner::where('owner_id', $user->owner)->firstOrFail();

        $estates = $owner->estates;

        $pagination = $estates->paginate(15);

        return view('user.owner.estates.index', compact('user', 'estates', 'pagination'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $estateCode)
    {
        $user = Auth::guard('web')->user();

        $estate = Estate::where('estate_code', $estateCode)->firstOrFail();
        $owner = $estate->owner;
        $zone = $estate->zone;
        $services = $estate->services;

        return view('user.owner.estates.show', compact('user', 'estate', 'owner', 'zone', 'services'));
    }
}
