<?php

use Illuminate\Support\Facades\Route;

Route::prefix('sms')->name('sms')->group(function () {
  Route::get('', [UserController::class, 'index'])->name('.create');
  Route::get('outbox', [UserController::class, 'outbox'])->name('.outbox');
  Route::get('sent', [UserController::class, 'sent'])->name('.sent');
});
