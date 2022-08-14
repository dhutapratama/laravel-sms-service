<?php

use App\Http\Controllers\Services\PhoneController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "phone", 'as' => "phone"], function () {
  Route::get('', [PhoneController::class, 'index']);
});
