<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {DB::table('commandes')->insert([
        [
            'utilisateur_id' => 1,
            'total_price' => 79.98,
            'date_commande' => now(),

            'first_name' => 'Ali',
            'last_name' => 'Ben Salah',
            'email' => 'ali@example.com',
            'shipping_address' => '123 Main St',
            'shipping_city' => 'Casablanca',
            'shipping_country' => 'Morocco',
            'shipping_cost' => 10.00,
            'tax' => 5.00,
            'notes' => 'Commande test',
        ],
        [
            'utilisateur_id' => 2,
            'total_price' => 29.99,
            'date_commande' => now(),

            'first_name' => 'Sara',
            'last_name' => 'El Idrissi',
            'email' => 'sara@example.com',
            'shipping_address' => '456 Elm St',
            'shipping_city' => 'Rabat',
            'shipping_country' => 'Morocco',
            'shipping_cost' => 5.00,
            'tax' => 2.00,
            'notes' => 'Autre test',
        ],
    ]);

    }
}
