@extends('layouts.admin')

@section('titulo_pagina', 'Lista de Usuarios')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-2">
    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 300;">Gestión de Usuarios</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Registrar Nuevo Usuario</a>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header py-3 bg-white">
        <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-list"></i> Lista de Usuarios Registrados</h6>
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
                        <th>Fecha de Registro</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><span class="badge badge-{{ $usuario->role == 'administrador' ? 'primary' : 'success' }}">{{ ucfirst($usuario->role) }}</span></td>
                        <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-info btn-circle" title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger btn-circle" title="Eliminar"><i class="fas fa-trash"></i></a>
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
    </div>
</div>
@endsection
