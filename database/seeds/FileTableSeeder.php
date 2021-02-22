<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->truncate();
        DB::table('files')->insert([
            [
                "name" => "Dự toán"
            ], [
                "name" => "Hợp đồng, Thanh lý HĐ, BB liên quan"
            ], [
                "name" => "Tạm ứng"
            ], [
                "name" => "HS thanh toán"
            ]
        ]);
    }
}
