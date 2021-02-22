<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_histories')->truncate();
        DB::table('file_histories')->insert([
            "file_id" => 1,
            "accountant_id" => 1,
            "step_id" => 1,
            "content" => json_encode([
                "Ngày nhận 1" => "20/03/2021",
                "Ngày nhận 2" => "",
                "Ngày nhận 3" => ""
            ])
        ]);
    }
}
