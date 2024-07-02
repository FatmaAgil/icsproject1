<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecyclerDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\GuideDashboard;
use App\Http\Controllers\PETGuideDashboard;
<<<<<<< HEAD
use App\Http\Controllers\QuizController;


=======
>>>>>>> upstream/master
use App\Http\Controllers\ContactMessageController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/event', function () {
    return view('eventandnews');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/home', function () {
    return Inertia('Home');
});
Route::get('/landingUser', function () {
    return view('plasticUser');
});
<<<<<<< HEAD
//Route::post('/quiz-submit', [QuizController::class, 'submit'])->name('quiz.submit');
//Route::get('/plastic-quiz', 'PlasticQuizController@index')->name('plastic-quiz.index');
//Route::post('/plastic-quiz', 'PlasticQuizController@store')->name('plastic-quiz.store');
Route::get('/PETGuide',[PETGuideDashboard::class, 'index'])->name('PETGuide');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

=======
Route::get('/PETGuide',[PETGuideDashboard::class, 'index'])->name('PETGuide');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
>>>>>>> upstream/master
Route::get('/guide',[GuideDashboard::class, 'index'])->name('guide');
Route::get('/adminDashboard',[AdminDashboard::class, 'index'])->name('admin');
Route::get('/landingRecycler',[RecyclerDashboard::class, 'index'])->name('landingRecycler');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/adminDashboard',[AdminDashboard::class, 'index'])->name('adminDashboard');
});
require __DIR__.'/auth.php';

