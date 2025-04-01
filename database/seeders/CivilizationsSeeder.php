<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('civilizations')->insert([
            [
                'name' => 'Ancient Egypt',
                'period' => '3100 BC - 332 BC',
                'location' => 'Egypt',
                'description' => 'Ancient Egypt was known for its pyramids, pharaohs, and advances in writing, agriculture, and architecture.',
            ],
            [
                'name' => 'Mesopotamian Civilization',
                'period' => '4000 BC - 539 BC',
                'location' => 'Iraq (Babylon, Sumer, Assyria)',
                'description' => 'One of the earliest civilizations, Mesopotamians invented writing (cuneiform) and built the first cities.',
            ],
            [
                'name' => 'Ancient Greece',
                'period' => '800 BC - 146 BC',
                'location' => 'Greece',
                'description' => 'The Greek civilization contributed to philosophy, democracy, theater, and the Olympic Games.',
            ],
            [
                'name' => 'Roman Empire',
                'period' => '27 BC - 476 AD',
                'location' => 'Italy and the Mediterranean',
                'description' => 'The Romans excelled in law, engineering, military strategy, and governance.',
            ],
            [
                'name' => 'Ancient China',
                'period' => '1600 BC - 1912 AD',
                'location' => 'China',
                'description' => 'Ancient China developed paper, the compass, gunpowder, and silk production.',
            ],
            [
                'name' => 'Mayan Civilization',
                'period' => '2000 BC - 1500 AD',
                'location' => 'Mexico, Guatemala, Belize, Honduras',
                'description' => 'The Mayans were known for their advanced knowledge in astronomy, mathematics, and architecture.',
            ],
        ]);
    }
}
