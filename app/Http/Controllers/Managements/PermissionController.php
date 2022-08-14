<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    $r->validate([
      'name' => ['required'],
    ]);

    $data = Permission::find($r->post('id'));
    if (!$data) {
      $data = new Permission;
    }

    $data->name   = $r->name;
    $data->save();

    return redirect(route('management.permission'));
  }


  public function edit(Request $r, int $id): View
  {
    $data = Permission::find($id);
    if (!$data) {
      return redirect(route('management.permission'))
        ->withErrors("permission not found");
    }

    return view('pages.permissions.edit', ['permission' => $data]);
  }

  public function delete(int $id): RedirectResponse
  {
    $permission = Permission::find($id);

    if (!$permission) {
      return redirect()->back()->withErrors("Not Found");
    }

    $permission->delete();
    return redirect()->back()->with('success', "Deleted");
  }
}
