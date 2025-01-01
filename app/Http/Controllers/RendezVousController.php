<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allrdv = DB::table('rendez_vouses')
                ->join('clients', 'rendez_vouses.client_id', '=', 'clients.id')
                ->select('*')
                ->get();
        return view('RendezVousComponents.index',compact('allrdv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('RendezVousComponents.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:Y-m-d\TH:i|before:finish_time',
            'finish_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'client_id' => 'required'
        ]);

        // la requête SQL :
        // SELECT EXISTS (
        //     SELECT 1
        //     FROM rendez_vouses
        //     WHERE start_time <= '2024-03-20 15:00'
        //     AND finish_time >= '2024-03-20 14:00'
        //     AND client_id = 1
        // ) AS existe_chevauchement;

        $existingRdv = RendezVous::where('start_time', '<=', $validated['finish_time'])
            ->where('finish_time', '>=', $validated['start_time'])
            ->where('client_id', $validated['client_id'])
            ->exists();

        if ($existingRdv)
            return redirect()->route('rendezvous.create')->withErrors(['start_time' => 'Deja un Client a une rendez Vous sur cet Date']);

        RendezVous::create($validated);
        return redirect()->route('rendezvous.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rdv = RendezVous::find($id);
        return view('RendezVousComponents.edit',compact('rdv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:Y-m-d\TH:i|before:finish_time',
            'finish_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'client_id' => 'required'
        ]);

        $rdv = RendezVous::find($id);

        $rdv->update($validated);

        return redirect()->route('rendezvous.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RendezVous::findorfail($id)->delete();
        return redirect()->route('rendezvous.index');
    }
}
