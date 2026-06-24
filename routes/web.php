<?php

use Illuminate\Support\Facades\Route;

// 1- Ruta raiz
Route::get('/', function () {
    $alumno = "Manuel"; 
    $esAdmin = true;            
    
    return view('inicio', compact('alumno', 'esAdmin'));
})->name('inicio');

// 2- Ruta /catalogo con nombre 'catalogo'
Route::get('/catalogo', function () {
    // Array con al menos 3
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