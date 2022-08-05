<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function index() {
    $permissions = Permission::all();

    return view('pages.permissions.index', [
      'permissions' => $permissions
    ]);
  }

  public function save(Request $r) {
    $permission = Permission::create(['name' => $r->name]);

    return redirect(route('management.permission'));
  }

  public function edit() {

  }

  public function remove(int $id) : RedirectResponse {
    $permission = Permission::findById($id);

    if (!$permission) {
      return redirect()->back()->withErrors("Not Found");
    }

    $permission->delete();
    return redirect()->back()->with('success', "Deleted");
  }
}
