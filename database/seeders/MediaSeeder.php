<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media')->insert([
            [
                'lien' => 'uploads/articles/rome.jpg',
                'type' => 'image',
                'article_id' => 1,
                'created_at' => now(), // Ajout des timestamps
                'updated_at' => now(),
            ],
            [
                'lien' => 'uploads/articles/egypt.jpg',
                'type' => 'image',
                'article_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
