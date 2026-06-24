@extends('layouts.app')

@section('titulo', 'Catálogo de Insumos')

@section('contenido')
    <h1>Catálogo de Componentes</h1>
    
    <ul style="list-style: none; padding: 0;">
        @forelse($insumos as $insumo)
            <li style="padding: 10px; border-bottom: 1px solid #eee;">
                {{ $loop->iteration }}. <strong>{{ $insumo['nombre'] }}</strong> 
                - ${{ number_format($insumo['precio'], 2) }}
            </li>
        @empty
            <p style="color: red; font-style: italic;">No hay insumos cargados en el sistema</p>
        @endforelse
    </ul>
@endsection