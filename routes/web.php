<?php

use App\Http\Controllers\EtudiantDashbordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/hello', function () {
    return view('test');
});

Route::get("/help", function(){
    return Inertia::render('demande/test');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('test')->group(function(){
    Route::get('/login',[UserController::class, 'login'])->name('auth.login');
    Route::post('/login',[UserController::class, 'dologin']);
    Route::delete('/logout',[UserController::class, 'logout'])->name('auth.logout');


    Route::prefix('dashboard')->group(function(){
        Route::get('',[EtudiantDashbordController::class,'index' ])->name('dashboard1');
    });
    
    



});

require __DIR__.'/auth.php';
