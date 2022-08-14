<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
  public function index(Request $r): View
  {
    $users = User::get();

    return view('pages.users.index', [
      'users' => $users
    ]);
  }

  public function save(Request $r): RedirectResponse
  {
    $r->validate([
      'name' => ['required'],
    ]);

    $data = User::find($r->post('id'));
    if (!$data) {
      $data = new User();
      $r->validate([
        'password' => ['required', 'confirmed', Password::defaults()],
        'email' => ['required', 'unique:users'],
      ]);
      $data->email  = $r->email;
    } else {
      if ($r->password) {
        $r->validate([
          'password' => ['confirmed', Password::defaults()],
        ]);
        $data->password  = Hash::make($r->password);
      }
    }

    $data->name   = $r->name;
    $data->save();

    event(new Registered($data));

    return redirect(route('management.user'));
  }

  public function edit(Request $r, int $id): View
  {
    $data = User::find($id);

    if (!$data) {
      return redirect(route('management.user'))
        ->withErrors("user not found");
    }

    return view('pages.users.edit', ['user' => $data]);
  }

  public function delete(Request $r, int $id): RedirectResponse
  {
    $r->user();
    $data = User::find($id);

    if (!$data) {
      return redirect(route('management.user'))
        ->withErrors("user not found");
    }

    if ($r->user()->id == $data->id) {
      return redirect(route('management.user'))
        ->withErrors("can't remove self account");
    }

    $data->delete();

    return redirect(route('management.user'));
  }

  public function role_index(): View
  {
    $users = User::get();
    $roles = Role::get();

    return view('pages.users.roles.index', compact('users', 'roles'));
  }

  public function role_save(Request $r): RedirectResponse
  {
    $data = User::find($r->post('id'));
    if (!$data) {
      return redirect()
        ->back()
        ->withErrors("user not found");
    }

    $data->assignRole($r->post('role'));

    return redirect(route('management.user.role'));
  }

  public function role_delete(int $id, string $role): RedirectResponse
  {
    $data = User::find($id);

    if (!$data) {
      return redirect(route('management.user'))
        ->withErrors("user not found");
    }

    if ($data->hasRole($role)) {
      $data->removeRole($role);
    }

    return redirect(route('management.user.role'));
  }

  public function permission_index(): View
  {
    $users = User::get();
    $permissions = Permission::get();

    return view('pages.users.permissions.index', compact('users', 'permissions'));
  }

  public function permission_save(Request $r): RedirectResponse
  {
    $data = User::find($r->post('id'));
    if (!$data) {
      return redirect()
        ->back()
        ->withErrors("user not found");
    }

    if (!$data->hasDirectPermission($r->post('permission'))) {
      $data->givePermissionTo($r->post('permission'));
    }

    return redirect(route('management.user.permission'));
  }

  public function permission_delete(int $id, string $permission): RedirectResponse
  {
    $data = User::find($id);

    if (!$data) {
      return redirect(route('management.user'))
        ->withErrors("user not found");
    }

    if ($data->hasDirectPermission($permission)) {
      $data->revokePermissionTo($permission);
    }

    return redirect(route('management.user.permission'));
  }
}
