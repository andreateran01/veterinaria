<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get('/',[AuthController::class, 'index'])->name('login');
    Route::post('/logear',[AuthController::class,'logear'])->name('logear');
});

Route::middleware("auth")->group(function () {
    Route::get('/veterinario/home', [AuthController::class, 'veterinario_home'])->name('veterinario.home');
    Route::get('/admin/home', [AuthController::class, 'admin_home'])->name('admin.home');
    
    // Rutas de Expedientes
    Route::view('/expedientes', 'modules.expedientes.index')->name('expedientes.index');
    Route::get('/expedientes/buscar', [\App\Http\Controllers\ExpedienteController::class, 'search'])->name('expedientes.search');
    Route::get('/admin/usuarios', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/admin/usuarios/crear', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.usuarios.create');
    Route::post('/admin/usuarios', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.usuarios.store');
    Route::get('/admin/usuarios/{id}/editar', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.usuarios.edit');
    Route::put('/admin/usuarios/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.usuarios.update');
    Route::get('/admin/usuarios/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.usuarios.show');
    Route::delete('/admin/usuarios/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.usuarios.destroy');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
