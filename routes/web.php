<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
Route::get('/', [DashboardController::class, 'index']);

Route::controller(PaymentController::class)
    ->prefix('payment')
    ->as('payment.')
    ->group(function() {
        Route::get('/initiatePush','intiateStkPush')->name('initiatePush');
    });

// Route::get('/event', [EventController::class, 'index']);
Route::get('/event', function() {
    return view('eventandnews');
});
