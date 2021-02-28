<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([[
            "id" => 1,
            "name" => "Admin",
            "code" => "admin"
        ], [
            "id" => 2,
            "name" => "Kế toán  viên",
            "code" => "ktv"
        ], [
            "id" => 3,
            "name" => "Kế toán trưởng",
            "code" => "ktt"
        ], [
            "id" => 4,
            "name" => "Ban giám hiệu",
            "code" => "bgh"
        ]]);
    }
}
