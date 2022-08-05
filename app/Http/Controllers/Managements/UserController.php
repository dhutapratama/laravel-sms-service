<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $r) {
    $users = User::get();

    return view('pages.users.index', [
      'users' => $users
    ]);
  }

  public function add(Request $r, int $id) {

  }

  public function edit(Request $r, int $id) {

  }

  public function update(Request $r, int $id) {

  }

  public function delete(Request $r, int $id) {

  }
}
