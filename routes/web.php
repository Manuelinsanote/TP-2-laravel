<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;  // ← AGREGAR ESTO

// ==========================================
// RUTAS DEL TP1 
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
// RUTAS DEL TP2 
// ==========================================

// Ruta para mostrar el listado de equipos
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

// Ruta para guardar un nuevo equipo
Route::post('/equipos/guardar', [EquipoController::class, 'store'])->name('equipos.store');