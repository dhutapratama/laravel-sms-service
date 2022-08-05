<?php

use App\Http\Controllers\Managements\RoleController;
use Illuminate\Support\Facades\Route;

// Role Management.
Route::prefix('role')->name('.role')->group(function() {
  Route::get('', [RoleController::class, 'index']);
  Route::get('edit', [RoleController::class, 'edit'])->name('.edit');
  Route::get('remove/{id}', [RoleController::class, 'remove'])->name('.remove');

  Route::post('save', [RoleController::class, 'save'])->name('.save');
});
