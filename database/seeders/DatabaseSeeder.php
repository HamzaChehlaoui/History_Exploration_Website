<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UtilisateursSeeder::class,
            CategoriesSeeder::class,
            ArticlesSeeder::class,
            ProduitsSeeder::class,
            CommentairesSeeder::class,
            MediaSeeder::class,
            CommandesSeeder::class,
            FavoritesSeeder::class,
        ]);
    }
}
