@extends('layouts.admin')

@section('titulo_pagina', 'Dashboard de Administración')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard de Administración</h1>
</div>

<div class="row">
    <!-- Card Usuarios -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Usuarios Registrados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">--</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Sistema -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Estado del Sistema</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Óptimo</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-server fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-shield"></i> Área de Administración</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <strong>Hola, {{ auth()->user()->name ?? 'Administrador' }}.</strong> Estás en el panel de control general. Desde aquí puedes gestionar usuarios, roles y configuraciones del sistema.
                </div>
                <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</div>
@endsection
