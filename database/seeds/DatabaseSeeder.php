<?php

use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        OrganizationTableSeeder::class,
        UserTableSeeder::class,
        FileStepTableSeeder::class,
        FileTypeTableSeeder::class,
        RoleTableSeeder::class,
        UserRoleTableSeeder::class,
        FileTableSeeder::class,
        FileHistorySeeder::class
      ]);
    }
}
