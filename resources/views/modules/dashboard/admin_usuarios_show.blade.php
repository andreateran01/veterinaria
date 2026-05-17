@extends('layouts.admin')

@section('titulo_pagina', 'Eliminar Usuario')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-2">
    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 300;">Detalle de Eliminación: {{ $usuario->name }}</h1>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow border-0 mb-4" style="border-radius: 8px; overflow: hidden;">
            <!-- Header con fondo naranja/rojo -->
            <div class="card-header py-3" style="background-color: #f25c3b; color: white; border-bottom: none;">
                <h6 class="m-0 font-weight-bold" style="font-size: 1rem;">
                    <i class="fas fa-exclamation-circle mr-1"></i> Advertencia de Eliminación
                </h6>
            </div>
            
            <div class="card-body text-center p-5">
                <!-- Icono grande -->
                <div class="mb-4">
                    <i class="fas fa-user-times" style="font-size: 5rem; color: #f25c3b;"></i>
                </div>
                
                <!-- Título central -->
                <h3 class="mb-3" style="color: #f25c3b; font-weight: 600;">¿Estás completamente seguro?</h3>
                
                <!-- Textos explicativos -->
                <p class="text-gray-700 mb-2" style="font-size: 1.1rem;">
                    Estás a punto de eliminar al usuario:
                </p>
                <p class="text-gray-900 font-weight-bold mb-4" style="font-size: 1.2rem;">
                    {{ $usuario->name }} ({{ $usuario->email }})
                </p>
                
                <p class="text-muted mb-5" style="font-size: 0.95rem;">
                    Esta acción <strong>no se puede deshacer</strong>.
                </p>

                <!-- Botones centrados -->
                <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="d-flex justify-content-center mt-2">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary mr-3 px-4 py-2 shadow-sm" style="border-radius: 5px;">
                        <i class="fas fa-arrow-left mr-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn text-white px-4 py-2 shadow-sm" style="background-color: #f25c3b; border-color: #f25c3b; border-radius: 5px;">
                        <i class="fas fa-trash-alt mr-1"></i> Sí, Eliminar Definitivamente
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
