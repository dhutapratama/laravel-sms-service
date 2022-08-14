<?php

use App\Http\Controllers\Managements\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => '.user'], function () {
  Route::get('', [UserController::class, 'index']);
  Route::post('', [UserController::class, 'save']);

  Route::get('edit/{id}', [UserController::class, 'edit'])->name('.edit');
  Route::get('delete/{id}', [UserController::class, 'delete'])->name('.delete');



  Route::group(['prefix' => 'role', 'as' => '.role'], function () {
    Route::get('', [UserController::class, 'role_index']);
    Route::post('', [UserController::class, 'role_save']);
    Route::get('delete/{id}/{role}', [UserController::class, 'role_delete'])->name('.delete');
  });


  Route::group(['prefix' => 'permission', 'as' => '.permission'], function () {
    Route::get('', [UserController::class, 'permission_index']);
    Route::post('', [UserController::class, 'permission_save']);
    Route::get('delete/{id}/{permission}', [UserController::class, 'permission_delete'])->name('.delete');
  });
});
