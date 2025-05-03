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
                'time_period' => '509 BCE - 476 CE',
                'location' => 'Europe, North Africa, Middle East',
                'description' => 'A deep dive into the culture and history of the Roman Empire.',
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
                'references' => 'Gibbon, E. (1776). The History of the Decline and Fall of the Roman Empire.
                                Ward-Perkins, B. (2005). The Fall of Rome and the End of Civilization.',
                
                'utilisateur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'status' =>'approved',
            ],
            [
                'title' => 'Ancient Egypt: The Land of Pharaohs',
                'time_period' => '3100 BCE - 332 BCE',
                'location' => 'Nile Valley, North Africa',
                'description' => 'A deep dive into the culture, art, and society of ancient Egypt.',
                'content' => 'Ancient Egypt stood as one of humanity\'s earliest and most enduring civilizations, flourishing along the Nile River for nearly 3,000 years. From the unification of Upper and Lower Egypt around 3100 BCE to its conquest by Alexander the Great in 332 BCE, this remarkable civilization developed sophisticated systems of writing, monumental architecture, complex religious beliefs, and artistic traditions that continue to captivate the world today.

The pharaohs, considered divine intermediaries between gods and humans, ruled with absolute authority. Famous rulers like Ramesses II, Hatshepsut, and Tutankhamun left indelible marks through their building projects, military campaigns, and cultural innovations. The Great Pyramids of Giza, constructed during the Old Kingdom period, remain testament to Egyptian engineering prowess and religious devotion.

Egyptian society was highly stratified, with priests, scribes, and officials forming the elite under the pharaoh. Agriculture, centered around the annual flooding of the Nile, provided the economic foundation for the civilization, while artisans created exquisite works in stone, metal, and papyrus. Their hieroglyphic writing system preserved religious texts, administrative records, and literary works.

Perhaps most distinctive was Egypt\'s elaborate preparation for the afterlife, involving mummification, tomb decoration, and burial goods. These practices reflected a sophisticated worldview where existence continued after death, requiring proper preservation of the body and provision of necessities for the journey beyond.',
                'references' => 'Wilkinson, T. (2010). The Rise and Fall of Ancient Egypt.
                                Shaw, I. (2000). The Oxford History of Ancient Egypt.',

                'utilisateur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'status' =>'approved',
            ],
            [
                'title' => 'First Sample Article',
                'time_period' => '1500 BCE - 500 BCE',
                'location' => 'Mediterranean Basin',
                'description' => 'A brief description of the first article.',
                'content' => 'This is the content of the first sample article in the database.',
                'references' => 'Smith, J. (2020). Sample Historical References. Academic Press.',

                'utilisateur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'status' =>'approved',
            ],
        ]);
    }
}
