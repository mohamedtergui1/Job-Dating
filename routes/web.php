<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/search', [AnnonceController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // annonces


    Route::resource("annonces", AnnonceController::class, [
        'names'=>[
            'index' => "annonces"
        ]
    ]);

    // entreprises

    Route::resource("entreprises", EntrepriseController::class, [
        'names'=>[
            'index' => "entreprises"
        ]
    ])->except(['show']);
});

Route::get('/annonces/{annonce}', [AnnonceController::class, 'show'])->name('annonces.show');


require __DIR__.'/auth.php';
