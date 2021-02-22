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
            "name" => "user",
            "full_name" => "user",
            "email" => "user@gmail.com",
            "password" => bcrypt('123456'),
            "organization_id" => 1
        ], [
            "id" => 2,
            "name" => "ktv",
            "full_name" => "Do Van A",
            "email" => "ktv@gmail.com",
            "password" => bcrypt('123456'),
            "organization_id" => 1
        ], [
            "id" => 3,
            "name" => "ktt",
            "full_name" => "Do Van B",
            "email" => "ktt@gmail.com",
            "password" => bcrypt('123456'),
            "organization_id" => 1
        ], [
            "id" => 4,
            "name" => "bgh",
            "full_name" => "Nguyen Van B",
            "email" => "bgh@gmail.com",
            "password" => bcrypt('123456'),
            "organization_id" => 1
        ]]);
    }
}
