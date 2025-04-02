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
    {
        DB::table('commandes')->insert([
            [
                'user_id' => 1,
                'total_price' => 79.98,
                'status' => 'Completed'
            ],
            [
                'user_id' => 2,
                'total_price' => 29.99,
                'status' => 'Pending'
            ],
        ]);
    }
}
