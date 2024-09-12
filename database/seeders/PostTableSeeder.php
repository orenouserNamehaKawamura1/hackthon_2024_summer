<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            "user_id" => 1,
            "tag_id" => 1,
            "title" => "sampleTitle",
            "description" => "ここに本文が入ります",
            "img_path" => "sample.jpg",
            "good" => 0,
            "problem_flag" => 0,
            "delete_flag" => 0,
        ];
        DB::table("posts")->insert($param);
        
    }
}
