@extends('layouts.admin')

@section('titulo_pagina', 'Lista de Usuarios')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-2">
    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 300;">Usuarios</h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card shadow-sm border-0 mb-4" style="border-left: 4px solid #343a40 !important;">
    <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-users mr-1"></i> Lista de Usuarios</h6>
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Nuevo Usuario</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="align-middle">{{ $usuario->id }}</td>
                        <td class="align-middle">
                            {{ $usuario->name }}
                            @if($usuario->role === 'veterinario')
                                <i class="fas fa-stethoscope text-info ml-1" style="font-size: 0.8rem;" title="Veterinario"></i>
                            @endif
                        </td>
                        <td class="align-middle">{{ $usuario->email }}</td>
                        <td class="align-middle"><span class="badge badge-pill badge-{{ $usuario->role == 'administrador' ? 'primary' : 'success' }} px-3 py-2">{{ ucfirst($usuario->role) }}</span></td>
                        <td class="align-middle"><span class="badge badge-pill badge-success px-3 py-2">Activo</span></td>
                        <td class="align-middle text-center">
                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-info shadow-sm" title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.usuarios.show', $usuario->id) }}" class="btn btn-sm btn-danger shadow-sm" title="Eliminar"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @if($usuarios->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">No hay usuarios registrados.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-4">
            {{ $usuarios->links() }}
        </div>
    </div>
</div>
@endsection
