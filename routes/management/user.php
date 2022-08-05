<?php

use App\Http\Controllers\Managements\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('.user')->group(function() {
  Route::get('', [UserController::class, 'index']);

});
