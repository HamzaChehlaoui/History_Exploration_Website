<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favorites')->insert([
            ['utilisateur_id' => 1, 'article_id' => 1, 'date_creation' => now()],
            ['utilisateur_id' => 2, 'article_id' => 1, 'date_creation' => now()],
        ]);
    }
}
