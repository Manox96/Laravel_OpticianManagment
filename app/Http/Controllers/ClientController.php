<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allclients = Client::all();
        return view('ClientComponents.index',compact('allclients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ClientComponents.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date|before:today',
        ]);
        Client::create($validated);
        return redirect()->route('client.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('ClientComponents.edit',compact('client'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'numero' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date|before:today',
        ]);
        $client = Client::find($id);
        
        $client->update($validated);

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::find($id)->delete();
        return redirect()->route('client.index');
    }
}
