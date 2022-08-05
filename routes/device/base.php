<?php

use Illuminate\Support\Facades\Route;

Route::prefix('device')->name('device')->group(function () {
  Route::get('', [UserController::class, 'index']);
});
