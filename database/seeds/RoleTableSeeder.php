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
        ],[
            "id" => 2,
            "name" => "Người thanh toán",
        ], [
            "id" => 3,
            "name" => "Kế toán  viên",
        ], [
            "id" => 4,
            "name" => "Kế toán trưởng",
        ], [
            "id" => 5,
            "name" => "Ban giám hiệu",
        ]]);
    }
}
