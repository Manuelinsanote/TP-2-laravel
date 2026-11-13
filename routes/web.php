<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

// ==========================================
// RUTAS DEL TP1 (del trabajo anterior)
// ==========================================

// 1- Ruta raiz
Route::get('/', function () {
    $alumno = "Manuel"; 
    $esAdmin = true;            
    
    return view('inicio', compact('alumno', 'esAdmin'));
})->name('inicio');

// 2- Ruta /catalogo con nombre 'catalogo'
Route::get('/catalogo', function () {
    $insumos = [
        ['nombre' => 'Arduino Uno',    'precio' => 15000],
        ['nombre' => 'Estaño',         'precio' => 3500],
        ['nombre' => 'Protoboard',     'precio' => 4500],
        ['nombre' => 'Cables Jumper',  'precio' => 2000],
    ];
    
    return view('catalogo', compact('insumos'));
})->name('catalogo');

// 3. Ruta /insumo/{id} con parámetro requerido
Route::get('/insumo/{id}', function ($id) {
    return view('detalle', compact('id'));
})->name('detalle');

// ==========================================
// RUTAS DE AUTENTICACIÓN (Breeze)
// ==========================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ==========================================
// RUTAS DEL TP2 (PROTEGIDAS CON AUTH)
// ==========================================

Route::middleware(['auth'])->group(function () {
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    Route::post('/equipos/guardar', [EquipoController::class, 'store'])->name('equipos.store');
});