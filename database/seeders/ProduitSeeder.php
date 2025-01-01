<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            ['nom' => 'Lunettes de vue',
             'type' => 1,
              'quantite_stock' => 50,
              'prix' => 120.00],
            ['nom' => 'Lentilles de contact', 'type' => 3, 'quantite_stock' => 100, 'prix' => 30.00],
        ]);
    }
}
