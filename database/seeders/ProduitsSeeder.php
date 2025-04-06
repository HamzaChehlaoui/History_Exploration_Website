<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'name' => 'Ancient Rome Coins',
                'description' => 'Authentic Roman coins from the 2nd century BC.',
                'prix' => 49.99,
                'quantite' => 10
            ],
            [
                'name' => 'Egyptian Papyrus Scroll',
                'description' => 'Handcrafted reproduction of ancient Egyptian papyrus.',
                'prix' => 29.99,
                'quantite' => 15
            ],
            [
                'name' => 'Ancient Rome Coins',
                'description' => 'Authentic Roman coins from the 2nd century BC.',
                'prix' => 49.99,
                'quantite' => 10
            ],
            [
                'name' => 'Egyptian Papyrus Scroll',
                'description' => 'Handcrafted reproduction of ancient Egyptian papyrus.',
                'prix' => 29.99,
                'quantite' => 15
            ],
            [
                'name' => 'Ancient Rome Coins',
                'description' => 'Authentic Roman coins from the 2nd century BC.',
                'prix' => 49.99,
                'quantite' => 10
            ],
            [
                'name' => 'Egyptian Papyrus Scroll',
                'description' => 'Handcrafted reproduction of ancient Egyptian papyrus.',
                'prix' => 29.99,
                'quantite' => 15
            ],
        ]);
    }
}
