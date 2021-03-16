<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([[
            "id" => 1,
            "name" => "admin",
            "full_name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt('123456'),
            "unit_id" => 1,
            "role_id" => 1
        ], [
            "id" => 3,
            "name" => "ktv",
            "full_name" => "Do Van A",
            "email" => "ktv@gmail.com",
            "password" => bcrypt('123456'),
            "unit_id" => 1,
            "role_id" => 2
        ], [
            "id" => 4,
            "name" => "ktt",
            "full_name" => "Do Van B",
            "email" => "ktt@gmail.com",
            "password" => bcrypt('123456'),
            "unit_id" => 1,
            "role_id" => 3
        ], [
            "id" => 5,
            "name" => "bgh",
            "full_name" => "Nguyen Van B",
            "email" => "bgh@gmail.com",
            "password" => bcrypt('123456'),
            "unit_id" => 1,
            "role_id" => 4
        ]]);
    }
}
