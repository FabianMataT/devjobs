<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\SalarioController;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.index');

Route::get('/salarios', [SalarioController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('salarios.index');
Route::get('/salarios/create', [SalarioController::class, 'create'])->middleware(['auth', 'verified'])->name('salarios.create');
Route::post('/salarios', [SalarioController::class, 'store'])->middleware(['auth', 'verified'])->name('salarios.store');

Route::get('/categorias', [CategoriaController::class, 'index'])->middleware(['auth', 'verified', 'rol.reclutador'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->middleware(['auth', 'verified'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->middleware(['auth', 'verified'])->name('categorias.store');

Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');

Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified', 'rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
