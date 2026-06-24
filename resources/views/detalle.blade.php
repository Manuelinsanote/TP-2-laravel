@extends('layouts.app')

@section('titulo', 'Detalle del Insumo')

@section('contenido')
    <h1>Detalle del Insumo ID: {{ $id }}</h1>
    <p>Aquí se mostrarían los detalles del insumo seleccionado.</p>
@endsection