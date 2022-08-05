<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Outbox;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    //Outbox::factory(37)->create();

    $this->call([
      PermissionSeeder::class,
      RoleSeeder::class,
      UserSeeder::class,
    ]);
  }
}
