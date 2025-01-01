<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\DashboardController;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('client',ClientController::class);
    Route::resource('rendezvous',RendezVousController::class);
    
    Route::middleware('is_admin')->group(function () {
        Route::resource('categorie',CategorieController::class);
        Route::resource('produit',ProduitController::class);
    });


    Route::get('/dashboard', [DashboardController::class,'show'])->name('dashboard');
});

require __DIR__.'/auth.php';
