<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use 

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media')->insert([
            [
                'file_path' => 'uploads/articles/rome.jpg',
                'type' => 'image',
                'article_id' => 1
            ],
            [
                'file_path' => 'uploads/articles/egypt.jpg',
                'type' => 'image',
                'article_id' => 2
            ],
        ]);
    }
}
