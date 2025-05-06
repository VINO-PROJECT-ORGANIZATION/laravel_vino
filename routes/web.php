<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\BouteilleController;
use Goutte\Client;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/test-saq', [ScraperController::class, 'index']);
    //routes pour les bouteilles
    Route::get('/bouteilles', [BouteilleController::class, 'index'])->name('bouteilles.index');
    Route::get('/bouteilles/{id}', [BouteilleController::class, 'show'])->name('bouteilles.show');
    //routes pour les celliers
   
});

Route::get('/celliers', function () {
    return view('celliers/index');
});





require __DIR__ . '/auth.php';
