<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Facture;


class DetailsFactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factures = Facture::all();

        foreach($factures as $facture) {
            DB::table('details_factures')->insert([
                'facture_id' => $facture->id,
                'produit_id' => rand(1, 10),
                'quantite' => rand(1, 5),
                'prix_unitaire' => DB::raw('(SELECT prix FROM produits WHERE id = produit_id)'),
                'montant' => DB::raw('quantite * prix_unitaire'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
