<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('posts')->insert([
                'alias' => Str::random(10),
                'title' => Str::random(10),
                'text' => Str::random(10),
                'media' => Str::random(10),
                'rating' => rand(0,100),
                'status' => 'published',
                'user_id' => rand(0,100),
                'community_id' => rand(0,100),
            ]);
        }
    }
}
