<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Role Management.
 */
class RoleController extends Controller
{
  public function index(): View
  {
    $roles = Role::all();

    return view('pages.roles.index', [
      'roles' => $roles
    ]);
  }

  public function save(Request $r): RedirectResponse
  {
    $r->validate([
      'name' => ['required'],
    ]);

    $data = Role::find($r->post('id'));
    if (!$data) {
      $data = new Role;
    }

    $data->name   = $r->name;
    $data->save();

    return redirect(route('management.role'));
  }

  public function edit(Request $r, int $id): View
  {
    $data = Role::find($id);
    if (!$data) {
      return redirect(route('management.role'))
        ->withErrors("role not found");
    }

    return view('pages.roles.edit', ['role' => $data]);
  }

  public function delete(int $id): RedirectResponse
  {
    $role = Role::findById($id);

    if (!$role) {
      return redirect()->back()->withErrors("Not Found");
    }

    $role->delete();
    return redirect()->back()->with('success', "Deleted");
  }

  public function permission_index(): View
  {
    $data = Role::all();
    $permissions = Permission::get();
    return view('pages.roles.permission.index', [
      'roles' => $data,
      'permissions' => $permissions
    ]);
  }

  public function permission_save(Request $r): RedirectResponse
  {
    $r->validate([
      'id' => ['required'],
      'permission' => ['required'],
    ]);

    $data = Role::find($r->post('id'));
    if (!$data) {
      return redirect(route('management.role.permission'))->withErrors('invalid role');
    } else {
      if ($data->hasPermissionTo($r->post('permission')))
        $data->revokePermissionTo($r->post('permission'));
    }
    $data->givePermissionTo($r->post('permission'));

    return redirect(route('management.role.permission'));
  }

  public function permission_edit(Request $r, int $id, string $permission): View
  {
    $data = Role::find($id);
    $roles = Role::get();
    $permissions = Permission::get();

    if (!$data) {
      return redirect(route('management.role'))
        ->withErrors("role not found");
    }

    return view('pages.roles.permission.edit', [
      'data' => $data,
      'req_permission' => $permission,
      'roles' => $roles,
      'permissions' => $permissions,
    ]);
  }

  public function permission_delete(int $id, string $permission): RedirectResponse
  {
    $role = Role::findById($id);
    if (!$role) {
      return redirect()->back()->withErrors("Not Found");
    }

    $role->revokePermissionTo($permission);
    return redirect()->back();
  }
}
