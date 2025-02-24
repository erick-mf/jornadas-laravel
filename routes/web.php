<?php

use App\Http\Controllers\Admin\EventoController as AdminEventoController;
use App\Http\Controllers\Admin\InscripcionController as AdminInscripcionController;
use App\Http\Controllers\Admin\PagoController as AdminPagoController;
use App\Http\Controllers\Admin\PonenteController as AdminPonenteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/ponentes', [PonenteController::class, 'index'])->name('ponentes.index');
Route::get('/ponentes/{ponente}', [PonenteController::class, 'show'])->name('ponentes.show');
Route::get('/confirmar-cuenta/{token}', [RegisteredUserController::class, 'confirmarCuenta'])->name('confirmar.cuenta');

require __DIR__.'/auth.php';

// Rutas de admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('eventos', AdminEventoController::class)->except('show');
    Route::resource('ponentes', AdminPonenteController::class)->except('show');
    // problemas con la ruta de inscripciones se tiene que cambiar el nombre de la ruta
    Route::resource('inscripciones', AdminInscripcionController::class)->except('show')->parameters(['inscripciones' => 'inscripcion']);
    Route::resource('pagos', AdminPagoController::class)->except('show');
});

// Rutas para usuarios autenticados
Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/eventos/{evento}/inscripcion/nueva', [InscripcionController::class, 'store'])->name('inscripcion.store');
    Route::delete('/inscripcion/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripcion.destroy');
    Route::resource('pagos', PagoController::class)->only(['store', 'show']);
});
