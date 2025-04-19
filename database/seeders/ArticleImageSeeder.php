<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('article_image')->insert([
            [
                'article_id' => 1,
                'path' => 'https://static.techno-science.net/illustration/Libre/2025/01/05/la-chute-de-l-empire-romain-d-orient.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 2,
                'path' => 'https://cdn.mos.cms.futurecdn.net/HgDjfQuhdcoBKL7BDLSyW5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 3,
                'path' => 'https://c1.wallpaperflare.com/preview/377/7/632/newspaper-historic-front-page.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 1,
                'path' => 'https://e1.pxfuel.com/desktop-wallpaper/573/702/desktop-wallpaper-rome-the-beauty-of-3-000-roman-empire.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 2,
                'path' => 'https://www.egypttoursportal.com/images/2019/12/Ancient-Egyptian-Pharaohs-Rulers-Egypt-Tours-Portal.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 3,
                'path' => 'https://www.amnews.com/wp-content/uploads/sites/41/2018/12/FPH-1227-Front-Page.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 1,
                'path' => 'https://e0.pxfuel.com/wallpapers/47/878/desktop-wallpaper-roman-empire-rome-empire.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 2,
                'path' => 'https://www.realmofhistory.com/wp-content/uploads/2023/07/10-facts-ancient-egyptian-armies-new-kingdom-770x437.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => 3,
                'path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtBv7KLb4PhXnYQ1SPaspKzSf4oTyPHwJHxlwriUl-MgNW-i5CJgLYiGLhuTD0EqQul5I&usqp=CAU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
