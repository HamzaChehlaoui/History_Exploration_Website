<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'content' => 'The Rise and Fall of the Roman Empire
Introduction
The Roman Empire was one of the most influential civilizations in human history, shaping governance, law, culture, and warfare. Spanning over 500 years, it saw extraordinary expansion, peak power, and eventual decline, leaving behind a legacy that continues to impact the world today.

The Rise of Rome
Foundation and Republic (509 BCE – 27 BCE)

Rome began as a small city-state and evolved into a Republic governed by elected officials and a Senate.

Its military strength allowed expansion into Italy, Carthage, and Greece through wars like the Punic Wars against Carthage.

Transition to Empire (27 BCE – 180 CE)

In 27 BCE, Augustus Caesar became the first emperor, marking the beginning of the Roman Empire.

This era, known as Pax Romana, brought stability, economic prosperity, and infrastructure growth (roads, aqueducts, and monumental architecture).

Golden Age (96 CE – 180 CE)

Emperors like Trajan, Hadrian, and Marcus Aurelius expanded Rome to its greatest territorial extent.

Roman law, engineering, and culture flourished, influencing Europe, North Africa, and the Middle East.

The Fall of Rome
Internal Weaknesses

Political instability, weak leadership, and civil wars weakened Rome.

Economic troubles included inflation, reliance on slave labor, and overspending.

Military Decline

The Roman army became dependent on mercenaries with divided loyalties.

Continuous barbarian invasions (e.g., Visigoths, Vandals, and Huns) drained military strength.

Split and Collapse (395 CE – 476 CE)

In 395 CE, Emperor Theodosius I divided Rome into Western and Eastern Empires.

The Western Roman Empire fell in 476 CE when Odoacer, a Germanic leader, deposed the last Roman emperor, Romulus Augustulus.

Legacy of Rome
Government: Inspired modern democracy and legal systems.

Architecture: Developed arches, domes, and aqueducts.

Language: Latin influenced English, Spanish, French, and other languages.

Philosophy: Thinkers like Seneca and Cicero shaped Western thought.

Conclusion
The Roman Empire s rise was fueled by military strength, innovation, and governance, while its fall resulted from economic instability, political corruption, and external invasions. Despite its decline, Romes legacy continues to shape the world today in profound ways.',
                'description' => 'A deep dive into the culture.',
                'category_id' => 1,
                'utilisateur_id' => 1,
                'date_publication' => now(),
            ],
            [
                'title' => 'Ancient Egypt: The Land of Pharaohs',
                'content' => 'A deep dive into the culture, art, and society of ancient Egypt.',
                'description' => 'A deep dive into the culture.',
                'category_id' => 2,
                'utilisateur_id' => 2,
                'date_publication' => now(),
            ],
            [
                'title' => 'First Sample Article',
                'content' => 'This is the content of the first sample article in the database.',
                'description' => 'A brief description of the first article.',
                'date_publication' => '2025-04-19',
                'category_id' => 1,
                'utilisateur_id' => 2,

            ],
        ]);
    }

}
