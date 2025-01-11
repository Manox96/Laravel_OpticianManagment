<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RendezVousController extends Controller
{
    public function index()
    {

        $allrdv = RendezVous::with('client')->get();
        // return $allrdv;
        return view('RendezVousComponents.index',compact('allrdv'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('RendezVousComponents.create',compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:Y-m-d\TH:i|before:finish_time',
            'finish_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'client_id' => 'required'
        ]);

        $existingRdv = RendezVous::where('start_time', '<=', $validated['finish_time'])
            ->where('finish_time', '>=', $validated['start_time'])
            ->where('client_id', $validated['client_id'])
            ->exists();

        if ($existingRdv)
            return redirect()->route('rendezvous.create')->withErrors(['start_time' => 'Deja un Client a une rendez Vous sur cet Date']);

        RendezVous::create($validated);
        return redirect()->route('rendezvous.index');
    }

    public function edit(string $id)
    {
        // $rdv = DB::table('rendez_vouses')->where('id','=',$id)->get();
        $rdv = RendezVous::find($id);
        $clients = Client::all();
        // return [$allrdv,$clients];
        return view('RendezVousComponents.edit',compact('rdv','clients'));
    }

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
    public function destroy(string $id)
    {
        RendezVous::findorfail($id)->delete();
        return redirect()->route('rendezvous.index');
    }
}
