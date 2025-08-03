<?php

namespace App\Http\Controllers\User\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class OwnerServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('web')->user();
        $owner = Owner::where('owner_id', $user->owner)->firstOrFail();

        $estates = $owner->estates;

        $services = $estates->services;

        $pagination = $services->paginate(15);

        return view('user.owner.services.index', compact('user', 'estates', 'services', 'pagination'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                $user = Auth::guard('web')->user();
        $service = Service::where($id);

        $agent = $service->agent;
        $estates = $service->estates;

        return view('user.owner.services.show', compact('estates', 'agent', 'service', 'user'));
    }
}
