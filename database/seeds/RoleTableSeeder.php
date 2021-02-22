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
            "name" => "Người thanh toán",
        ], [
            "id" => 2,
            "name" => "Kĩ thuật viên",
        ], [
            "id" => 3,
            "name" => "Kế toán trưởng",
        ], [
            "id" => 4,
            "name" => "Ban giám hiệu",
        ]]);
    }
}
