<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecyclerDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\GuideDashboard;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\GuideQuiz;
use App\Http\Controllers\PETGameController;
use App\Http\Controllers\PETPlasticController; // Corrected here
use App\Http\Controllers\PledgeController;
use App\Http\Controllers\PETGuideDashboard;
use App\Http\Controllers\HDPEPlasticController; // Added here

Route::get('/', function () {
    return view('welcome');
});
Route::get('/event', function () {
    return view('eventandnews');
});
Route::get('/terms', function () {
    return view('terms');
});
//Route::get('/home', function () { return Inertia('Home');});
Route::get('/landingUser', function () {
    return view('plasticUser');
});
Route::get('/PETDisposalGuide', [PETPlasticController::class, 'index'])->name('PETDisposalGuide');
Route::post('/quizSubmit', [PETPlasticController::class, 'quizSubmit'])->name('quiz.submit');
Route::post('/PETDisposalGuide/quiz', [PETPlasticController::class, 'quizSubmit'])->name('PETDisposalGuide.quiz');
Route::post('/PETDisposalGuide/pledge', [PETPlasticController::class, 'takePledge']);
Route::get('/PETDisposalGuide/{id}', [PETPlasticController::class, 'show']);
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/PETGuide',[PETGuideDashboard::class, 'index'])->name('PETGuide');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::get('/guide',[GuideDashboard::class, 'index'])->name('guide');
Route::get('/quiz',[GuideQuiz::class, 'index'])->name('quiz');
Route::get('/PETGame',[PETGameController::class,'index']);
Route::get('/adminDashboard',[AdminDashboard::class, 'index'])->name('admin');
Route::get('/landingRecycler',[RecyclerDashboard::class, 'index'])->name('landingRecycler');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/adminDashboard',[AdminDashboard::class, 'index'])->name('adminDashboard');
});
Route::get('/HDPEDisposalGuide', [HDPEPlasticController::class, 'index'])->name('HDPEDisposalGuide');
Route::get('SubmitQuiz',[HDPEPlasticController::class,'SubmitQuiz'])->name('submit.quiz');
Route::post('/hdpe-disposal-guide/quiz', [HDPEPlasticController::class, 'quiz'])->name('HDPEDisposalGuide.quiz');
Route::get('/HDPEDisposalGuide/{id}', [HDPEPlasticController::class, 'show']);
Route::get('/hdpe-disposal-guide', [HDPEPlasticController::class, 'index'])->name('HDPEDisposalGuide.index');
//Route::post('/hdpe-disposal-guide/quiz', [HDPEPlasticController::class, 'quiz'])->name('HDPEDisposalGuide.quiz');
require __DIR__.'/auth.php';
