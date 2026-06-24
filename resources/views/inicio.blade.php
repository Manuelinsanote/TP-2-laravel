@extends('layouts.app')

@section('titulo', 'Página de Inicio')

@section('contenido')
    <h1>¡Bienvenido al sistema, {{ $alumno }}!</h1>
    
    @if($esAdmin)
        <div style="background: #d4edda; padding: 10px; margin-top: 15px;">
            tienes permisos de edición
        </div>
    @else
        <div style="background: #fff3cd; padding: 10px; margin-top: 15px;">
            Modo de solo lectura
        </div>
    @endif
@endsection