<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('factures')->insert([
            ['client_id' => 1, 'date_facture' => now(), 'montant_total' => 150.00],
            ['client_id' => 2, 'date_facture' => now(), 'montant_total' => 200.00],
        ]);
    }
}
