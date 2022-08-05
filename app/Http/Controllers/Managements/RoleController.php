<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Role Management.
 */
class RoleController extends Controller
{
  public function index() {
    $roles = Role::all();

    return view('pages.roles.index', [
      'roles' => $roles
    ]);
  }

  public function save(Request $r) {
    $role = Role::create(['name' => $r->name]);

    return redirect(route('management.role'));
  }

  public function remove(int $id) : RedirectResponse {
    $role = Role::findById($id);

    if (!$role) {
      return redirect()->back()->withErrors("Not Found");
    }

    $role->delete();
    return redirect()->back()->with('success', "Deleted");
  }
}
