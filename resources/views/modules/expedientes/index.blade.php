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
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-folder-open"></i> Gestión de Expedientes</h6>
                <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Nuevo Expediente</button>
            </div>
            <div class="card-body">
                <p>Aquí se mostrará el listado de expedientes de los pacientes de la veterinaria.</p>
                <!-- Aquí irá la tabla de expedientes posteriormente -->
            </div>
        </div>
    </div>
</div>
@endsection
