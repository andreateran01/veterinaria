@extends('layouts.admin')

@section('titulo_pagina', 'Registrar Usuario')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-2">
    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 300;">Nuevo Usuario</h1>
</div>

<div class="card shadow-sm border-0 mb-4" style="border-left: 4px solid #343a40 !important;">
    <div class="card-header py-3 bg-white">
        <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-user-plus mr-1"></i> Formulario de Registro</h6>
    </div>
    <div class="card-body">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.usuarios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- SECCIÓN DATOS DE USUARIO -->
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="name">Nombre Completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password">Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation">Confirmar Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="role">Rol del Usuario <span class="text-danger">*</span></label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Seleccione un rol...</option>
                        <option value="administrador" {{ old('role') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="veterinario" {{ old('role') == 'veterinario' ? 'selected' : '' }}>Veterinario</option>
                    </select>
                </div>
            </div>

            <!-- SECCIÓN DATOS DE VETERINARIO (OCULTA POR DEFECTO) -->
            <div id="veterinario_fields" style="display: {{ old('role') == 'veterinario' ? 'block' : 'none' }}; background-color: #f8f9fc; padding: 20px; border-radius: 8px; border-left: 4px solid #1cc88a;" class="mb-4">
                <h5 class="text-success mb-3" style="font-weight: 600;"><i class="fas fa-stethoscope"></i> Información Profesional del Veterinario</h5>
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nombre_completo">Nombre Completo del Doctor <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ old('nombre_completo') }}">
                        <small class="text-muted">Nombre que aparecerá en recetas y reportes médicos.</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="especialidad">Especialidad <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="cedula_profesional">Cédula Profesional <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cedula_profesional" name="cedula_profesional" value="{{ old('cedula_profesional') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="foto_firma">Firma Digitalizada / Sello (Opcional)</label>
                        <input type="file" class="form-control-file" id="foto_firma" name="foto_firma" accept="image/png, image/jpeg, image/jpg">
                        <small class="text-muted">Formatos admitidos: JPG, PNG. Tamaño máx: 2MB.</small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary mr-2 px-4">Cancelar</a>
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-1"></i> Guardar Usuario</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('startbootstrap/js/admin/usuarios/create.js') }}"></script>
@endpush
