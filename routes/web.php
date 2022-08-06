<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mikrotik\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public
require __DIR__ . '/auth.php';

// Authenticated
Route::middleware('auth')->group(function () {
  Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

  // Administrative area
  require __DIR__ . '/management/base.php';
  require __DIR__ . '/sms/base.php';
  require __DIR__ . '/device/base.php';
});
