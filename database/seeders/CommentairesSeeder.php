<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commentaires')->insert([
            [
                'content' => 'Great article about Ancient Rome!',
                'date_commentaire' => now(), // Ajout de la date
                'utilisateur_id' => 2,
                'article_id' => 1
            ],
            [
                'content' => 'I love learning about Egyptian history.',
                'date_commentaire' => now(), // Ajout de la date
                'utilisateur_id' => 1,
                'article_id' => 2
            ],
        ]);
    }
}
