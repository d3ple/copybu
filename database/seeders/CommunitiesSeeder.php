<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communities = [
            [ 
                'alias' => 'movies', 
                'name' => 'Фильмы'
            ],
            [ 
                'alias' => 'games', 
                'name' => 'Игры'
            ],
            [ 
                'alias' => 'stories', 
                'name' => 'Истории'
            ],
            [ 
                'alias' => 'dev', 
                'name' => 'Разработка'
            ],
            [ 
                'alias' => 'sneakers', 
                'name' => 'Кроссовки'
            ],
            [ 
                'alias' => 'politics', 
                'name' => 'Политика'
            ]
        ];

        foreach($communities as $community) {
            DB::table('communities')->insert([
                'alias' => $community['alias'],
                'name' => $community['name'],
                'description' => "Это сообщество про " . strtolower($community['name']),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
