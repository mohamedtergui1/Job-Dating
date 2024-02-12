<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;


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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/userprofile', [UserController::class, 'show'])->name('userprofile');
    Route::post('/addskills', [UserController::class, 'addSkill'])->name('addskills');
    Route::post('/postuler', [UserController::class, 'postuler'])->name('postuler');
    Route::get('/matchannonces', [HomeController::class, 'matchannonces'])->name('matchannonces');
    Route::get('/allannonces', [HomeController::class, 'allannonces'])->name('allannonces');
    Route::get('/userprofile/edit', [UserController::class, 'edit'])->name('userprofile.edit');
    


    // annonces


    
});
Route::middleware('auth','role:admin')->group(function () { 
    Route::resource("annonces", AnnonceController::class, [
        'names'=>[
            'index' => "annonces"
        ]
    ]);

    Route::resource("skills", SkillController::class, [
        'names'=>[
            'index' => "skills"
        ]
    ]);


    // entreprises

    Route::resource("entreprises", EntrepriseController::class, [
        'names'=>[
            'index' => "entreprises"
        ]
    ])->except(['show']);



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


 });

Route::get('/annonces/{annonce}', [AnnonceController::class, 'show'])->name('annonces.show');


require __DIR__.'/auth.php';
