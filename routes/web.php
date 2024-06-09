<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/event', function () {
    return view('eventandnews');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

require __DIR__.'/auth.php';

