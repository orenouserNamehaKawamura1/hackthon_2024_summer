<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $param = [
        //    "name" => "節約術"
        // ];
        // DB::table("tags")->insert($param);
        $param = [
           "name" => "自炊"
        ];
        DB::table("tags")->insert($param);
        $param = [
           "name" => "家事"
        ];
        DB::table("tags")->insert($param);
        $param = [
           "name" => "防犯"
        ];
        DB::table("tags")->insert($param);
        $param = [
           "name" => "防災"
        ];
        DB::table("tags")->insert($param);
        $param = [
           "name" => "暮らし"
        ];
        DB::table("tags")->insert($param);
        $param = [
           "name" => "支出"
        ];
        DB::table("tags")->insert($param);
        $param = [
           "name" => "その他"
        ];
        DB::table("tags")->insert($param);
    }
}
