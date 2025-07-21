<?php

namespace App\Http\Controllers\User\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        $pagination = Service::paginate(15);

        return view('services.index', compact('services', 'pagination'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        $agent = $service->agent;
        $estates = $service->estates;

        return view('services.show', compact('estates', 'agent', 'service'));
    }
}
