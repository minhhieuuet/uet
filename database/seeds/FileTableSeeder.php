<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                "name" => "Hồ sơ 1",
                "user_id" => 2,
                "payer_name" => "Nguyen Van A",
                "current_step_id" => 1,
                "price" => 200000,
                "file_type_id" => 1,
                "organization_id" => 1,
                "created_at" => Carbon::now() 
            ],
            [
                "name" => "Hồ sơ 2",
                "user_id" => 2,
                "payer_name" => "Tran Thi B",
                "current_step_id" => 2,
                "price" => 300000,
                "file_type_id" => 1,
                "organization_id" => 1,
                "created_at" => Carbon::now() 
            ],
            [
                "name" => "Hồ sơ 3",
                "user_id" => 3,
                "payer_name" => "Nguyen Van C",
                "current_step_id" => 4,
                "price" => 100000,
                "file_type_id" => 1,
                "organization_id" => 1,
                "created_at" => Carbon::now() 
            ]
        ]);
    }
}
