<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_types')->truncate();
        DB::table('file_types')->insert([
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
