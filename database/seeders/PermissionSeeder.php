<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $crud = ["*", "show", "insert", "update", "delete"];
    $permissions = ["user", "role", "permission"];

    foreach ($permissions as $permission) {
      foreach ($crud as $action) {
        Permission::create(['name' => sprintf("%s.%s", $permission, $action)]);
      }
    }
  }
}
