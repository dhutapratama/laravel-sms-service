<?php

use Illuminate\Support\Facades\Route;

# Access to http://<url>/management/<sub-path>
Route::prefix('management')->name('management')->group(function () {
  // Restricted, only admin can access this page.
  Route::middleware(['role:admin'])->group(function () {
    require __DIR__ . '/user.php';
    require __DIR__ . '/permission.php';
    require __DIR__ . '/role.php';
  });
});
