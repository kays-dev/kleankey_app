<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::all();
        $pagination = Owner::paginate(15);

        return view('owners.index', compact('owners', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lname' => 'required|string',
            'fname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $owner = Owner::create([
            'owner_name' => strtoupper($request->input('lname')),
            'owner_surname' => $request->input('fname'),
            'owner_address' => strtoupper($request->input('address')),
            'owner_mail' => $request->input('email'),
            'owner_tel' => $request->input('phone'),
        ]);

        return redirect(route('owners.create'))->with('success', 'Client ' . $owner->owner_surname . ' ' . $owner->owner_name . ' créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $owner = Owner::findOrFail($id);

        $estates = $owner->estates;

        return view('owners.show', compact('owner', 'estates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $owner = Owner::findOrFail($id);

        $estates = $owner->estates;

        return view('owners.edit', compact('owner', 'estates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $owner = Owner::findOrFail($id);

        $request->validate([
            'lname' => 'required|string',
            'fname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $owner->update([
            'owner_name' => mb_strtoupper($request->input('lname'), 'UTF-8'),
            'owner_surname' => $request->input('fname'),
            'owner_address' => mb_strtoupper($request->input('address'), 'UTF-8'),
            'owner_mail' => $request->input('email'),
            'owner_tel' => $request->input('phone'),
        ]);

        return redirect(route('owners.show', $owner->owner_id))->with('success', 'Client ' . $owner->owner_surname . ' ' . $owner->owner_name . ' modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->delete();

        return redirect(route('owners.index'))->with('success', 'Client supprimé');
    }
}
