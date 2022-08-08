<?php

use App\Http\Controllers\Sms\OutboxController;
use App\Http\Controllers\Sms\SentController;
use Illuminate\Support\Facades\Route;

Route::prefix('sms')->name('sms')->group(function () {
  Route::get('', [OutboxController::class, 'index'])->name('.create');
  Route::get('outbox', [OutboxController::class, 'index'])->name('.outbox');
  Route::get('sent', [SentController::class, 'index'])->name('.sent');
});
