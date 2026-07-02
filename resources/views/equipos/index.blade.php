@extends('layouts.app')

@section('titulo', 'Gestión de Equipos')

@section('contenido')
    <h1>Gestión de Equipos del Laboratorio</h1>

    {{-- Mensaje de éxito si se guardó un equipo --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    {{-- ============================================ --}}
    {{-- LISTADO DE EQUIPOS --}}
    {{-- ============================================ --}}
    <h2>Listado de Equipos</h2>

    @forelse($equipos as $equipo)
        <div style="border: 1px solid #ccc; padding: 1rem; margin: 0.5rem 0; border-radius: 5px;">
            <strong>{{ $loop->iteration }}.</strong> 
            <strong>Nombre:</strong> {{ $equipo->nombre }} | 
            <strong>N° Serie:</strong> {{ $equipo->numero_serie }} | 
            <strong>Descripción:</strong> {{ $equipo->descripcion ?? 'Sin descripción' }}
        </div>
    @empty
        <p style="color: orange;"><strong> No hay equipos cargados en el sistema</strong></p>
    @endforelse

    {{-- ============================================ --}}
    {{-- FORMULARIO DE ALTA --}}
    {{-- ============================================ --}}
    <h2>Registrar Nuevo Equipo</h2>

    <form action="{{ route('equipos.store') }}" method="POST" style="max-width: 500px;">
        @csrf

        <div style="margin-bottom: 1rem;">
            <label for="nombre">Nombre del Componente:</label><br>
            <input type="text" id="nombre" name="nombre" required maxlength="80" 
                   style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="numero_serie">Número de Serie:</label><br>
            <input type="text" id="numero_serie" name="numero_serie" required 
                   style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="descripcion">Descripción (opcional):</label><br>
            <textarea id="descripcion" name="descripcion" rows="3" 
                      style="width: 100%; padding: 0.5rem;"></textarea>
        </div>

        <button type="submit" style="background: #007bff; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 5px; cursor: pointer;">
            Guardar Equipo
        </button>
    </form>
@endsection