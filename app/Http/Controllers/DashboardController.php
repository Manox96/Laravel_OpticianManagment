<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function show()
    {
        // Get total counts
        $totalClients = Client::count();
        $totalProducts = Produit::count();
        $totalRendezVous = RendezVous::count();

        // Get low stock products (less than 10 items)
        $lowStockProducts = Produit::where('quantite_stock', '<', 10)->get();

        // les rendezvous de aujourd’hui
        $todayAppointments = RendezVous::whereDate('start_time', Carbon::today())
            ->with('client')
            ->orderBy('start_time')
            ->get();

        // Get total stock value
        $totalStockValue = Produit::sum(DB::raw('prix * quantite_stock'));

        return view('dashboard', compact(
            'totalClients',
            'totalProducts',
            'totalRendezVous',
            'lowStockProducts',
            'todayAppointments',
            'totalStockValue'
        ));
    }
}
