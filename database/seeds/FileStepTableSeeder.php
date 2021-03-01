<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileStepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_steps')->truncate();
        DB::table('file_steps')->insert([
            [
                "name" => "Đợi KTV nhận hồ sơ",
                "priority" => 1,
                "format" => json_encode([])
            ],
            [
                "name" => "KTV nhận hồ sơ",
                "priority" => 2,
                "format" => json_encode([
                    "day_1" => "",
                    "day_2" => "",
                    "day_3" => ""
                ])
            ], [
                "name" => "KTV trình KTT",
                "priority" => 3,
                "format" => json_encode([
                    "Ngày xử lý xong" => "",
                    "Ngày trình KTT" => ""
                ])
            ], [
                "name" => "KTT ký duyệt HS",
                "priority" => 4,
                "format" => json_encode([
                    "Ngày trả KTV" => ""
                ])
            ], [
                "name" => "BGH phê duyệt",
                "priority" => 5,
                "format" => json_encode([
                    "KTV gửi thư ký BGH" => "",
                    "Ngày BGH trả" => "",
                    "TK BGH ký trả HS" => ""
                ])
            ], [
                "name" => "KTV lập phiếu chi/UNC",
                "priority" => 6,
                "format" => json_encode([
                    "Ngày lập" => "",
                    "Ngày trình KTT" => ""
                ])
            ], [
                "name" => "KTT ký duyệt phiếu",
                "priority" => 7,
                "format" => json_encode([
                    "Ngày trả KTV" => "",
                    "Ngày thanh toán (Tiền mặt)" => ""
                ])
            ], [
                "name" => "BGH duyệt(UNC)",
                "priority" => 8,
                "format" => json_encode([
                    "KTV gửi thư ký BGH" => "",
                    "Ngày BGH trả" => "",
                    "TK BGH ký trả HS" => ""
                ])
            ], [
                "name" => "KTV chuyển KB/NH",
                "priority" => 9,
                "format" => json_encode([
                    "Ngày" => ""
                ])
            ], [
                "name" => "Ngày thanh toán",
                "priority" => 10,
                "format" => json_encode([
                    "Ngày" => ""
                ])
            ]
        ]);
    }
}
