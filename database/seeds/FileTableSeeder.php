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
                "name" => "Dự toán",
                "user_id" => 2,
                "payer_name" => "Nguyen Van A",
                "current_step_id" => 1,
                "price" => 200000,
                "file_type_id" => 1,
                "organization_id" => 1
            ]
        ]);
    }
}
