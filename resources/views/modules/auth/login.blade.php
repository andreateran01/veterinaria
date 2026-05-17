@extends('layouts.login')

@section('titulo_pagina', 'Login de usuario')

@section('contenido')
<div class="row" style="min-height: 60vh;">
    <div class="col-lg-6 d-none d-lg-flex bg-primary align-items-center justify-content-center p-5 rounded-left">
        <img src="{{ asset('img/imagen1.jpg') }}" class="img-fluid" alt="Logo Veterinaria" style="max-height: 350px; mix-blend-mode: multiply;">
    </div>
    
    <!-- Columna Derecha con Formulario -->
    <div class="col-lg-6 bg-white rounded-right">
        <div class="p-5 d-flex flex-column justify-content-center h-100">
            <div class="text-center">
                <i class="fas fa-paw fa-3x text-primary mb-3"></i>
                <h1 class="h5 text-gray-800 mb-4">Sistema de Veterinaria</h1>
            </div>
            <form class="user mt-2" action="{{ route('logear') }}" method="post">
                @csrf
                @method('post')
                
                <div class="form-group mb-3">
                    <input type="email" class="form-control form-control-user bg-light border-0 @error('email') is-invalid @enderror" name="email"
                        id="email" aria-describedby="emailHelp"
                        placeholder="ejemplo@correo.com" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control form-control-user bg-light border-0" name="password"
                        id="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    <i class="fas fa-sign-in-alt"></i> Ingresar al sistema
                </button>
            </form>
            
            <div class="text-center mt-5 pt-3">
                <small class="text-muted">&copy; {{ date('Y') }} Sistema de Veterinaria</small>
            </div>
        </div>
    </div>
</div>
@endsection
