<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\BouteilleHasCellierController;
use App\Http\Controllers\CellierController;
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
    Route::get('/celliers', [CellierController::class, 'index'])->name('celliers.index');
    Route::get('/celliers/create', [CellierController::class, 'create'])->name('celliers.create');
    Route::post('/celliers', [CellierController::class, 'store'])->name('celliers.store');
    // routes pour les bouteilles dans cellier
    Route::prefix('cellier-bouteilles')->name('cellier_bouteilles.')->group(function () {
        Route::delete('/{cellier_id}/{bouteille_id}', [BouteilleHasCellierController::class, 'destroy'])
            ->name('destroy');
        Route::get('/', [BouteilleHasCellierController::class, 'index'])->name('index');
        Route::get('/create', [BouteilleHasCellierController::class, 'create'])->name('create');
        Route::post('/', [BouteilleHasCellierController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BouteilleHasCellierController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BouteilleHasCellierController::class, 'update'])->name('update');


        // Bouteilles dans un cellier
        Route::get('/cellier/{cellier_id}/bouteilles', [BouteilleHasCellierController::class, 'bouteillesDansCellier'])->name('cellier.bouteilles');
        // Bouteilles d’un utilisateur (tous ses celliers)
        Route::get('/utilisateur/{user_id}/bouteilles', [BouteilleHasCellierController::class, 'bouteillesUtilisateur'])->name('utilisateur.bouteilles');
    });
});






require __DIR__ . '/auth.php';
