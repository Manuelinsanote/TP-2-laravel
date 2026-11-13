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
        <div style="border: 1px solid #ccc; padding: 1rem; margin: 0.5rem 0; border-radius: 5px; display: flex; align-items: center; gap: 1rem;">
            
            {{-- Mostrar imagen si existe --}}
            @if($equipo->imagen_ruta)
                <img src="{{ asset('storage/' . $equipo->imagen_ruta) }}" alt="Foto del equipo" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
            @else
                <div style="width: 100px; height: 100px; background: #eee; display: flex; align-items: center; justify-content: center; border-radius: 5px; color: #999;">Sin foto</div>
            @endif

            <div>
                <strong>{{ $loop->iteration }}.</strong> 
                <strong>Nombre:</strong> {{ $equipo->nombre }}<br>
                <strong>N° Serie:</strong> {{ $equipo->numero_serie }}<br>
                <strong>Descripción:</strong> {{ $equipo->descripcion ?? 'Sin descripción' }}
            </div>
        </div>
    @empty
        <p style="color: orange;"><strong>⚠️ No hay equipos cargados en el sistema</strong></p>
    @endforelse

    {{-- ============================================ --}}
    {{-- FORMULARIO DE ALTA --}}
    {{-- ============================================ --}}
    <h2>Registrar Nuevo Equipo</h2>

    <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 500px;">
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

        <div style="margin-bottom: 1rem;">
            <label for="imagen">Foto del Equipo:</label><br>
            <input type="file" id="imagen" name="imagen" accept="image/png, image/jpeg">
        </div>

        <button type="submit" style="background: #007bff; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 5px; cursor: pointer;">
            Guardar Equipo
        </button>
    </form>
@endsection