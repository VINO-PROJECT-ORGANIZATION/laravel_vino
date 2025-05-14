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
    Route::get('/profils', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profils', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profils', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/recup-bouteille', [ScraperController::class, 'index']);
    //routes pour les bouteilles
    Route::get('/bouteilles', [BouteilleController::class, 'index'])->name('bouteilles.index');
    Route::get('/bouteilles/creation', [BouteilleController::class, 'create'])->name('bouteilles.create');
    Route::post('/bouteilles', [BouteilleController::class, 'store'])->name('bouteilles.store');
    Route::get('/bouteilles/{id}/edition', [BouteilleController::class, 'edit'])->name('bouteilles.edit');
    Route::put('/bouteilles/{id}', [BouteilleController::class, 'update'])->name('bouteilles.update');
    Route::delete('/bouteilles/{id}', [BouteilleController::class, 'destroy'])->name('bouteilles.destroy');
    Route::get('/bouteilles/{id}', [BouteilleController::class, 'show'])->name('bouteilles.show');

    //routes pour les celliers
    Route::get('/celliers', [CellierController::class, 'index'])->name('celliers.index');
    Route::get('/celliers/creation', [CellierController::class, 'create'])->name('celliers.create');
    Route::post('/celliers', [CellierController::class, 'store'])->name('celliers.store');
    Route::get('/celliers/{id}/edition', [CellierController::class, 'edit'])->name('celliers.edit');
    Route::put('/celliers/{id}', [CellierController::class, 'update'])->name('celliers.update');
    Route::delete('/celliers/{id}', [CellierController::class, 'destroy'])->name('celliers.destroy');
    // routes pour les bouteilles dans cellier
    Route::prefix('cellier-bouteilles')->name('cellier_bouteilles.')->group(function () {
        Route::delete('/{cellier_id}/{bouteille_id}', [BouteilleHasCellierController::class, 'destroy'])
            ->name('destroy');
        Route::get('/', [BouteilleHasCellierController::class, 'index'])->name('index');
        Route::get('/creation', [BouteilleHasCellierController::class, 'create'])->name('create');
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
