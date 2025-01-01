<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatgorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'nom' => 'Lunettes de vue'],
            ['id' => 2, 'nom' => 'Lunettes de soleil'],
            ['id' => 3, 'nom' => 'Lentilles de contact'],
        ]);
    }
}
