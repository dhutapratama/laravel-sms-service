<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = ['admin', 'user', 'guest'];

    foreach ($roles as $role) {
      Role::create(['name' => $role]);
    }

    // Admin
    $role = Role::findByName('admin');
    $role->givePermissionTo(["user.*", "role.*", "permission.*"]);

    // // User
    // $role = Role::findByName('user');
    // $role->givePermissionTo(["user.*", "role.*", "permission.*"]);

    // // Guest
    // $role = Role::findByName('guest');
    // $role->givePermissionTo(["user.*", "role.*", "permission.*"]);
  }
}
