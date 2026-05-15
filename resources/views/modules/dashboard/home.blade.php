@extends('layouts.main')

@section('titulo_pagina', 'Panel de inicio')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Panel de inicio</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-home"></i> Bienvenido al sistema</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                    <strong>Hola, {{ auth()->user()->name ?? 'Administrador' }}.</strong> Selecciona una opción del menú lateral para comenzar.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
