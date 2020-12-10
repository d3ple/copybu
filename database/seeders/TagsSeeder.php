<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["Сериалы", "Артхаус", "Steam", "EGS", "Семья", "Отношения", "PHP", "GIT", "Nike", "yeezy", "Жириновский", "Обама"];

        foreach($tags as $tagName) {
            DB::table('tags')->insert([
                'name' => $tagName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
