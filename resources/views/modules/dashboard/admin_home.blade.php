@extends('layouts.admin')

@section('titulo_pagina', 'Dashboard de Administración')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-2">
    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 300;">Panel de Administrador</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow-sm border-0" style="border-left: 4px solid #343a40 !important;">
            <div class="card-body py-4">
                <h6 class="m-0 font-weight-bold text-gray-800 mb-3"><i class="fas fa-shield-alt"></i> Área Administrativa</h6>
                <p class="mb-2" style="font-size: 0.9rem; color: #858796;">
                    Bienvenido, <strong>{{ auth()->user()->name ?? 'Administrador' }}</strong>. Este es el panel exclusivo para administradores.
                </p>
                <p class="mb-0" style="font-size: 0.9rem; color: #858796;">
                    Desde aquí podrás gestionar a los usuarios y configuraciones globales del sistema.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
