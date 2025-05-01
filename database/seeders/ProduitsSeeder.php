<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'name' => 'Ancient Rome Coins',
                'description' => 'Authentic Roman coins from the 2nd century BC.',
                'prix' => 49.99,
                'quantite' => 10,
                'imagePath'=>'https://media.istockphoto.com/id/160372282/photo/ancient-coins-laying-in-golden-sand.jpg?s=612x612&w=0&k=20&c=ADbTK-Wq2Vf6wTHl_7E9AE3lrUW92OMBkXzrolgY1pw='
            ],
            [
                'name' => 'Egyptian Papyrus Scroll',
                'description' => 'Handcrafted reproduction of ancient Egyptian papyrus.',
                'prix' => 29.99,
                'quantite' => 15,
                'imagePath'=>'https://media.gettyimages.com/id/97411738/video/ancient-egyptian-papyrus.jpg?s=640x640&k=20&c=yKnrSoX9WjKWhY4ZBjAVTkXSngg03iSpBswPQFnzAjk='
            ],
            [
                'name' => 'Greek Amphora Replica',
                'description' => 'A beautifully crafted replica of a 5th century BC Greek amphora.',
                'prix' => 59.99,
                'quantite' => 8,
                'imagePath' => 'https://theancienthome.com/cdn/shop/products/001-ancient-greek-black-figure-chalcidian-krater-CEGR3001012_7fb3a232-eac7-44c7-bf48-70b7d7dff3ca_400x.jpg?v=1663851820'
            ],
            [
                'name' => 'Medieval Sword Miniature',
                'description' => 'Miniature of a knight’s sword from the 14th century.',
                'prix' => 24.99,
                'quantite' => 20,
                'imagePath' => 'https://p.turbosquid.com/ts-thumb/MV/5AhRTG/7z/sword_c1/png/1673475115/1920x1080/fit_q87/162f9fddd7b912cb99683a9f93e3e4381b7a25b1/sword_c1.jpg'
            ],
            [
                'name' => 'Viking Helmet Replica',
                'description' => 'Authentic-style Viking helmet made of metal and leather.',
                'prix' => 89.99,
                'quantite' => 5,
                'imagePath' => 'https://5.imimg.com/data5/SELLER/Default/2024/9/447883680/HR/II/XM/39295374/larp-medieval-viking-baldur-helmet-knight-armor-helmet-replica-500x500.png'
            ],
            [
                'name' => 'Aztec Calendar Stone Model',
                'description' => 'Detailed model of the famous Aztec calendar.',
                'prix' => 34.99,
                'quantite' => 12,
                'imagePath' => 'https://i.pinimg.com/736x/a5/ff/fa/a5fffa80b683d10540ce9bcf39c2e3ee.jpg'
            ],
            [
                'name' => 'Samurai Katana Letter Opener',
                'description' => 'A miniature katana perfect as a letter opener and collector’s item.',
                'prix' => 19.99,
                'quantite' => 25,
                'imagePath' => 'https://i.etsystatic.com/17314947/r/il/170c8d/2475748983/il_fullxfull.2475748983_hvhi.jpg'
            ],
            [
                'name' => 'Chinese Terracotta Warrior Model',
                'description' => 'Resin statue inspired by the Terracotta Army.',
                'prix' => 39.99,
                'quantite' => 10,
                'imagePath' => 'https://i.etsystatic.com/9858877/r/il/c7b28d/6803567177/il_fullxfull.6803567177_jcfg.jpg'
            ],
            [
                'name' => 'Ancient Mesopotamian Tablet Replica',
                'description' => 'Clay-like tablet with ancient cuneiform inscriptions.',
                'prix' => 27.99,
                'quantite' => 9,
                'imagePath' => 'https://www.meisterdrucke.uk/kunstwerke/1260px/Mesopotamian_School_-_Mesopotamie_raw_earth_tablet_with_cuneiform_inscription_Region_Sumer_3300_BC_Par_-_%28MeisterDrucke-999073%29.jpg'
            ],
            [
                'name' => 'Byzantine Cross Pendant',
                'description' => 'Elegant reproduction of a Byzantine cross in brass.',
                'prix' => 22.99,
                'quantite' => 18,
                'imagePath' => 'https://sirioti.com/cdn/shop/files/byzantine-silver-cross_c5f744c9-be90-44f9-bbee-5746a4ae5cfc.jpg?v=1737402817&width=1445'
            ],
            [
                'name' => 'Incan Sun Mask',
                'description' => 'Wall-mounted Inca sun mask made of ceramic.',
                'prix' => 44.99,
                'quantite' => 7,
                'imagePath' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2CQRCasDzcSZhJzmFGkw01G2ligNav_5skg&s'
            ],
            [
                'name' => 'Historic Compass Replica',
                'description' => 'Vintage-style compass modeled after 17th century designs.',
                'prix' => 32.50,
                'quantite' => 14,
                'imagePath' => 'https://thumbs.dreamstime.com/b/old-compass-vintage-map-30505918.jpg'
            ],

        ]);
    }
}
