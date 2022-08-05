<?php

use App\Http\Controllers\Managements\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('permission')->name('.permission')->group(function() {
  Route::get('', [PermissionController::class, 'index']);
  Route::get('edit', [PermissionController::class, 'edit'])->name('.edit');
  Route::get('remove/{id}', [PermissionController::class, 'remove'])->name('.remove');

  Route::post('save', [PermissionController::class, 'save'])->name('.save');
});
