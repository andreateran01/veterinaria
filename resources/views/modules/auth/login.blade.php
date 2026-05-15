@extends('layouts.login')

@section('titulo_pagina', 'Login de usuario')

@section('contenido')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Bienvenido a la Veterinaria</h1>
            </div>
            <form class="user" action="{{ route('logear') }}" method="post">
                @csrf
                @method('post')
                
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email"
                        id="email" aria-describedby="emailHelp"
                        placeholder="Ingresa tu correo..." required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password"
                        id="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Entrar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
