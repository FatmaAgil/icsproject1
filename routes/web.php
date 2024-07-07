<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecyclerDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\GuideDashboard;
use App\Http\Controllers\PETGuideDashboard;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NewsController;

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
Route::get('/tester', function () {
    return view('tester');
});
Route::prefix('admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


Route::prefix('admin')->group(function () {
       // Events Routes
       Route::get('events', [EventController::class, 'index'])->name('admin.events.index');
       Route::post('events', [EventController::class, 'store'])->name('admin.events.store');
       Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
       Route::put('events/{event}', [EventController::class, 'update'])->name('admin.events.update');
       Route::delete('events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');


    // News Routes
    Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::post('news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{id}/reply', [MessageController::class, 'reply'])->name('messages.reply');

});

//Route::post('/quiz-submit', [QuizController::class, 'submit'])->name('quiz.submit');
//Route::get('/plastic-quiz', 'PlasticQuizController@index')->name('plastic-quiz.index');
//Route::post('/plastic-quiz', 'PlasticQuizController@store')->name('plastic-quiz.store');
Route::get('/PETGuide',[PETGuideDashboard::class, 'index'])->name('PETGuide');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/PETGuide',[PETGuideDashboard::class, 'index'])->name('PETGuide');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
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

