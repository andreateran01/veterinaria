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
    Route::get('/admin/usuarios', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
