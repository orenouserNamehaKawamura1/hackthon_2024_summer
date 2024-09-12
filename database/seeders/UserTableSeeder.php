<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param =[
            "name" => "sampleUser",
            "email" => "morijyobi@sample.com",
            "password" => Hash::make("password")
        ];
        DB::table("users")->insert($param);
    }
}
