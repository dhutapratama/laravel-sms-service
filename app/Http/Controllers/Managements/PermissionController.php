<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function index(): View
  {
    $permissions = Permission::all();

    return view('pages.permissions.index', [
      'permissions' => $permissions
    ]);
  }

  public function save(Request $r): RedirectResponse
  {
    $permission = Permission::create(['name' => $r->name]);

    return redirect(route('management.permission'));
  }

  public function edit()
  {
  }

  public function remove(int $id): RedirectResponse
  {
    $permission = Permission::find($id);

    if (!$permission) {
      return redirect()->back()->withErrors("Not Found");
    }

    $permission->delete();
    return redirect()->back()->with('success', "Deleted");
  }
}
