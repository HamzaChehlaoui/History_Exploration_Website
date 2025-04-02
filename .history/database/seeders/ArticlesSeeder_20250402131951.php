<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use 

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'The Rise and Fall of the Roman Empire',
                'content' => 'An analysis of the key events that shaped the history of the Roman civilization.',
                'category_id' => 1,
                'user_id' => 1
            ],
            [
                'title' => 'Ancient Egypt: The Land of Pharaohs',
                'content' => 'A deep dive into the culture, art, and society of ancient Egypt.',
                'category_id' => 2,
                'user_id' => 2
            ],
        ]);
    }

}
