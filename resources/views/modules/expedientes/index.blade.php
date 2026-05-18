@extends('layouts.main')

{{-- Ocultar el sidebar en esta vista --}}
@section('hide_sidebar', true)

@section('titulo_pagina', 'Expedientes')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Expedientes</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <div class="row justify-content-center py-5">
                    <div class="col-md-8 col-lg-6 text-center">
                        <div class="mb-4">
                            <i class="fas fa-search fa-3x text-gray-300 mb-3"></i>
                            <h4 class="text-gray-800">Buscar Expediente</h4>
                            <p class="text-muted">Ingresa el nombre de la mascota, del propietario o número de expediente</p>
                        </div>
                        
                        <!-- Buscador -->
                        <div class="input-group input-group-lg mb-4 shadow-sm" style="border-radius: 50px; overflow: hidden;">
                            <input type="text" class="form-control border-0" placeholder="Ej. Max, Firulais, Juan Pérez..." aria-label="Buscar" style="padding-left: 25px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary border-0 px-4" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center mt-4">
                            <button type="button" class="btn btn-primary btn-lg mx-2 mb-3 mb-sm-0 shadow-sm" style="border-radius: 30px; padding: 10px 30px;">
                                <i class="fas fa-notes-medical mr-2"></i> Ver Consultas
                            </button>
                            <button type="button" class="btn btn-success btn-lg mx-2 shadow-sm" style="border-radius: 30px; padding: 10px 30px;">
                                <i class="fas fa-plus-circle mr-2"></i> Nuevo Paciente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
