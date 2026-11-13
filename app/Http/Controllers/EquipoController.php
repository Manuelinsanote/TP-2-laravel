<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Mostrar el listado de equipos
     */
    public function index()
    {
        // Recuperar todos los registros de la base de datos
        $equipos = Equipo::all();
        
        // Retornar la vista pasando los equipos
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Guardar un nuevo equipo en la base de datos
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:80',
        'numero_serie' => 'required|string|unique:equipos,numero_serie',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png|max:2048', // Validación de imagen
    ]);

    // Instanciar un nuevo objeto Equipo
    $equipo = new Equipo();
    
    // Asignar los atributos desde el Request
    $equipo->nombre = $request->input('nombre');
    $equipo->numero_serie = $request->input('numero_serie');
    $equipo->descripcion = $request->input('descripcion');
    
    // 👇 MANEJO DE LA IMAGEN 👇
    if ($request->hasFile('imagen')) {
        // Guarda la imagen en storage/app/public/hardware
        $path = $request->file('imagen')->store('public/hardware');
        
        // La ruta queda como "public/hardware/abc123.jpg"
        // Queremos guardarla como "hardware/abc123.jpg"
        $equipo->imagen_ruta = str_replace('public/', '', $path);
    }
    
    // Guardar en la base de datos
    $equipo->save();
    
    // Redirigir al listado con mensaje de éxito
    return redirect()->route('equipos.index')->with('success', 'Equipo registrado correctamente');
    }
}