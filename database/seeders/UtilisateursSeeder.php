<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateursSeeder extends Seeder
{
    public function run()
    {
        DB::table('utilisateurs')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'imagePath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWQ_cwOJtJzYy_bRLR9iTPgfZC1w6YD582vg&s',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'imagePath'=>'https://media.istockphoto.com/id/637969836/fr/photo/homme-sur-le-sommet-de-la-montagne-sur-fond-de-coucher-de-soleil.jpg?s=170667a&w=0&k=20&c=CygyD6A4dP9e-GMbzEiKSgAKXFuFComXY53L1pvFvsE=',
            ]
        ]);
    }
}

