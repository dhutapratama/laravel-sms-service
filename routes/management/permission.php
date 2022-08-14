<?php

use App\Http\Controllers\Managements\PermissionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'permission', 'as' => '.permission'], function () {
  Route::get('', [PermissionController::class, 'index']);
  Route::post('', [PermissionController::class, 'save']);

  Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('.edit');
  Route::get('delete/{id}', [PermissionController::class, 'delete'])->name('.delete');

});
