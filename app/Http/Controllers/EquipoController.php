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
        // Validar los datos del formulario (opcional pero recomendado)
        $request->validate([
            'nombre' => 'required|string|max:80',
            'numero_serie' => 'required|string|unique:equipos,numero_serie',
            'descripcion' => 'nullable|string',
        ]);

        // Instanciar un nuevo objeto Equipo
        $equipo = new Equipo();
        
        // Asignar los atributos desde el Request
        $equipo->nombre = $request->input('nombre');
        $equipo->numero_serie = $request->input('numero_serie');
        $equipo->descripcion = $request->input('descripcion');
        
        // Guardar en la base de datos
        $equipo->save();
        
        // Redirigir al usuario de vuelta al listado
        return redirect()->route('equipos.index')->with('success', 'Equipo registrado correctamente');
    }
}