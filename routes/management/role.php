<?php

use App\Http\Controllers\Managements\RoleController;
use Illuminate\Support\Facades\Route;

// Role Management.
Route::group(['prefix' => 'role', 'as' => '.role'], function () {
  Route::get('', [RoleController::class, 'index']);
  Route::post('', [RoleController::class, 'save']);

  Route::get('edit/{id}', [RoleController::class, 'edit'])->name('.edit');
  Route::get('delete/{id}', [RoleController::class, 'delete'])->name('.delete');

  // Permission attachment
  Route::group(['prefix' => 'permission', 'as' => '.permission'], function () {
    Route::get('', [RoleController::class, 'permission_index']);
    Route::post('', [RoleController::class, 'permission_save']);
    Route::get('delete/{id}/{permission}', [RoleController::class, 'permission_delete'])->name('.delete');
  });
});
