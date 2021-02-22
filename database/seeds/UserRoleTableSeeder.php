<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_roles')->truncate();
        DB::table('users_roles')->insert([[
            "role_id" => 1,
            "user_id" => 1,
        ], [
            "role_id" => 2,
            "user_id" => 2,
        ], [
            "role_id" => 3,
            "user_id" => 3,
        ], [
            "role_id" => 4,
            "user_id" => 4,
        ], ]);
    }
}
