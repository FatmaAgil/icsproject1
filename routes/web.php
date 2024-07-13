<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecyclerDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\GuideDashboard;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\GuideQuiz;
use App\Http\Controllers\PETGameController;
use App\Http\Controllers\PETPlasticController;
use App\Http\Controllers\LDPEPlasticController;
use App\Http\Controllers\PVCPlasticController;
use App\Http\Controllers\PpPlasticController;
use App\Http\Controllers\OtherPlasticController;
use App\Http\Controllers\PledgeController;

use App\Http\Controllers\PETGuideDashboard;
use App\Http\Controllers\HDPEPlasticController; // Added here
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\RecyclingOrganizationController;
use App\Http\Controllers\PaymentController;



Route::get('/test-log', function () {
    Log::info('Simple log message for testing');
    return response('Log written', 200);
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('/event', function () {
    return view('eventandnews');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/mpesa', function () {
    return view('mpesa');
});

//Route::get('/home', function () { return Inertia('Home');});
Route::get('/landingUser', function () {
    return view('plasticUser');
});
Route::get('/accessToken', function () {
    return view('accessToken');
});


Route::get('/register-organization', function () {
    return view('recyclerForm');
})->name('register.organization');



Route::post('/recycling_organizations', [RecyclingOrganizationController::class, 'store'])->name('recycling_organizations.store');

Route::get('/connect', [ConnectController::class, 'showMap'])->name('connect');
Route::get('/api/recycling-organizations', [ConnectController::class, 'getRecyclingOrganizations']);

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
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

//Route::get('/LDPEDisposalGuide', [LDPEPlasticController::class, 'index'])->name('LDPEDisposalGuide');
Route::get('SubmitQuiz',[LDPEPlasticController::class,'SubmitQuiz'])->name('submit.quiz');
Route::post('/ldpe-disposal-guide/quiz', [LDPEPlasticController::class, 'quiz'])->name('LDPEDisposalGuide.quiz');
Route::get('/LDPEDisposalGuide/{id}', [LDPEPlasticController::class, 'show']);
Route::get('/ldpe-disposal-guide', [LDPEPlasticController::class, 'index'])->name('LDPEDisposalGuide.index');
//Route::post('/hdpe-disposal-guide/quiz', [HDPEPlasticController::class, 'quiz'])->name('HDPEDisposalGuide.quiz');

Route::get('SubmitQuiz',[PVCPlasticController::class,'SubmitQuiz'])->name('submit.quiz');
Route::post('/pvc-disposal-guide/quiz', [PVCPlasticController::class, 'quiz'])->name('PVCDisposalGuide.quiz');
Route::get('/PVCDisposalGuide/{id}', [PVCPlasticController::class, 'show']);
Route::get('/pvc-disposal-guide', [PVCPlasticController::class, 'index'])->name('PVCDisposalGuide.index');

Route::get('SubmitQuiz',[PPPlasticController::class,'SubmitQuiz'])->name('submit.quiz');
Route::post('/pp-disposal-guide/quiz', [PPPlasticController::class, 'quiz'])->name('PPDisposalGuide.quiz');
Route::get('/PPDisposalGuide/{id}', [PPPlasticController::class, 'show']);
Route::get('/pp-disposal-guide', [PPPlasticController::class, 'index'])->name('PPDisposalGuide.index');


Route::get('SubmitQuiz',[OtherPlasticController::class,'SubmitQuiz'])->name('submit.quiz');
Route::post('/other-disposal-guide/quiz', [OtherPlasticController::class, 'quiz'])->name('OtherDisposalGuide.quiz');
Route::get('/OtherDisposalGuide/{id}', [OtherPlasticController::class, 'show']);
Route::get('/other-disposal-guide', [OtherPlasticController::class, 'index'])->name('OtherDisposalGuide.index');




require __DIR__.'/auth.php';
