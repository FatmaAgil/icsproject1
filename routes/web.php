<?php

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/event', function () {
    return view('eventandnews');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/landingUser', function () {
    return view('plasticUser');
});
Route::get('/profile', function () {
    return view('Userprofile');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

