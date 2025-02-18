<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rutas pública
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/ponentes', [PonenteController::class, 'index'])->name('ponentes.index');
Route::get('/ponentes/{ponente}', [PonenteController::class, 'show'])->name('ponentes.show');

require __DIR__.'/auth.php';

// Rutas para usuarios autenticados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
    // Route::get('/ponentes', [PonenteController::class, 'index'])->name('ponentes.index');
    Route::get('/ponentes/{ponente}', [PonenteController::class, 'show'])->name('ponentes.show');
    Route::resource('inscripciones', InscripcionController::class)->except(['edit', 'update']);
    Route::resource('pagos', PagoController::class)->only(['store', 'show']);
});

// Rutas de admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('eventos', EventoController::class);
    Route::resource('ponentes', PonenteController::class);
    Route::resource('inscripciones', InscripcionController::class);
    Route::resource('pagos', PagoController::class);
});
