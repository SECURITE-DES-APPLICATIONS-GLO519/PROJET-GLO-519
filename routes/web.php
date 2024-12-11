<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EtudiantController;
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


    Route::prefix('dashboard')->middleware('auth')->group(function(){
        Route::get('',[EtudiantDashbordController::class,'index' ])->name('dashboard1');
        Route::prefix('administrateur')->name('administrateur.')->group(function(){
            Route::get('',[AdministrateurController::class,'index'])->name('list');
            Route::get('create',[AdministrateurController::class,'create'])->name('create');
            Route::post('create',[AdministrateurController::class,'create_']);
            Route::get('update/{table}',[AdministrateurController::class, 'update'])->name('update');
            Route::post('update/{table}',[AdministrateurController::class, 'update_']);
            Route::get('delete/{table}',[AdministrateurController::class, 'delete'])->name('delete');
        });
        Route::prefix('departement')->name('departement.')->group(function(){
            Route::get('',[DepartementController::class,'index'])->name('list');
            Route::get('create',[DepartementController::class,'create'])->name('create');
            Route::post('create',[DepartementController::class,'create_'])->name('create_');
            Route::get('update/{table}',[DepartementController::class, 'update'])->name('update');
            Route::post('update/{table}',[DepartementController::class, 'update_'])->name('update_');
            Route::get('delete/{table}',[DepartementController::class, 'delete'])->name('delete');
        });
        Route::prefix('etudiant')->name('etudiant.')->group(function(){
            Route::get('',[EtudiantController::class,'index'])->name('list');
            Route::get('create',[EtudiantController::class,'create'])->name('create');
            Route::post('create',[EtudiantController::class,'create_']);
            Route::get('update/{table}',[EtudiantController::class, 'update'])->name('update');
            Route::post('update/{table}',[EtudiantController::class, 'update_']);
            Route::get('delete/{table}',[EtudiantController::class, 'delete'])->name('delete');
            Route::get('add_information',[EtudiantDashbordController::class, 'add_information'])->name('add_information');
            Route::post('add_information',[EtudiantDashbordController::class, 'add_information_'])->name('add_information_');
        });
    });

});

Route::prefix('etudiant')->name('etudiant.')->group(function(){
    Route::get('',[EtudiantDashbordController::class,'index'])->name('index');
    Route::get('show_information',[EtudiantDashbordController::class,'show_information'])->name('show_information');
    Route::get('add_information',[EtudiantDashbordController::class, 'add_information'])->name('add_information');
    Route::post('add_information',[EtudiantDashbordController::class, 'add_information_'])->name('add_information_');
    Route::prefix('certificat')->name('certificat.')->group(function(){
        Route::get('',[EtudiantDashbordController::class,'get_certificat'])->name('list');
        Route::get('add',[EtudiantDashbordController::class,'add_certificat'])->name('add');
        Route::post('add',[EtudiantDashbordController::class,'add_certificat_']);
        Route::get('show/{table}',[EtudiantDashbordController::class,'show_certificat'])->name('show');
        Route::get('annuler/{table}',[EtudiantDashbordController::class,'annuler_certificat'])->name('annuler');
    });
    Route::prefix('releve-note')->name('releve.')->group(function(){
        Route::get('',[EtudiantDashbordController::class,'get_releve'])->name('list');
        Route::get('add',[EtudiantDashbordController::class,'add_releve'])->name('add');
        Route::post('add',[EtudiantDashbordController::class,'add_releve_']);
        Route::get('show/{table}',[EtudiantDashbordController::class,'show_releve'])->name('show');
        Route::get('annuler/{table}',[EtudiantDashbordController::class,'annuler_releve'])->name('annuler');
    });
    Route::prefix('diplome')->name('diplome.')->group(function(){
        Route::get('',[EtudiantDashbordController::class,'get_diplome'])->name('list');
        Route::get('add',[EtudiantDashbordController::class,'add_diplome'])->name('add');
        Route::post('add',[EtudiantDashbordController::class,'add_diplome_']);
        Route::get('show/{table}',[EtudiantDashbordController::class,'show_diplome'])->name('show');
        Route::get('annuler/{table}',[EtudiantDashbordController::class,'annuler_diplome'])->name('annuler');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('',[AdminDashboardController::class,'index'])->name('index');
    Route::prefix('demande')->name('demande.')->group(function(){
        Route::get('show/{table}',[AdminDashboardController::class,'show_demande'])->name('show');
        Route::get('valider/{table}',action: [AdminDashboardController::class,'valider_demande'])->name('valider');
    });
    Route::prefix('releve-note')->name('releve.')->group(function(){
        Route::get('',[AdminDashboardController::class,'get_releve'])->name('list');
    });
    Route::prefix('certificat')->name('certificat.')->group(function(){
        Route::get('',[AdminDashboardController::class,'get_certificat'])->name('list');
    });
    Route::prefix('diplome')->name('diplome.')->group(function(){
        Route::get('',[AdminDashboardController::class,'get_diplome'])->name('list');
    });


});

require __DIR__.'/auth.php';
