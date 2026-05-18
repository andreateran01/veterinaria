@extends('layouts.main')

{{-- Ocultar el sidebar en esta vista --}}
@section('hide_sidebar', true)

@section('titulo_pagina', 'Expedientes')

@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Expedientes</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <div class="row justify-content-center py-5">
                    <div class="col-md-8 col-lg-6 text-center">
                        <div class="mb-4">
                            <i class="fas fa-search fa-3x text-gray-300 mb-3"></i>
                            <h4 class="text-gray-800">Buscar Expediente</h4>
                            <p class="text-muted">Ingresa el nombre de la mascota, del propietario o número de expediente</p>
                        </div>
                        
                        <!-- Buscador -->
                        <div class="position-relative">
                            <div class="input-group input-group-lg mb-4 shadow-sm" style="border-radius: 50px; overflow: hidden; z-index: 10; position: relative;">
                                <input type="text" id="search-input" class="form-control border-0" placeholder="Ej. Max, Firulais, Juan Pérez..." aria-label="Buscar" style="padding-left: 25px;">
                                <div class="input-group-append">
                                    <button class="btn btn-primary border-0 px-4" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Resultados del Buscador -->
                            <div id="search-results" class="list-group position-absolute w-100 shadow-lg text-left" style="top: 45px; z-index: 5; display: none; border-radius: 0 0 20px 20px; padding-top: 15px; overflow: hidden; background: white;">
                                <!-- Resultados inyectados por JS -->
                            </div>
                        </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    let timeoutId;

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        clearTimeout(timeoutId);
        
        if (query.length < 2) {
            searchResults.style.display = 'none';
            searchResults.innerHTML = '';
            return;
        }

        // Debounce de 300ms
        timeoutId = setTimeout(() => {
            fetch(`/expedientes/buscar?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    
                    if (data.length === 0) {
                        searchResults.innerHTML = '<div class="list-group-item text-muted">No se encontraron resultados</div>';
                        searchResults.style.display = 'block';
                        return;
                    }

                    data.forEach(item => {
                        const a = document.createElement('a');
                        a.href = item.url;
                        a.className = 'list-group-item list-group-item-action d-flex justify-content-between align-items-center';
                        a.innerHTML = `
                            <div>
                                <h6 class="my-0"><strong>${item.nombre}</strong> <span class="badge badge-secondary ml-2">Folio: ${item.id}</span></h6>
                                <small class="text-muted"><i class="fas fa-user text-gray-400"></i> ${item.dueno_nombre}</small>
                            </div>
                            <i class="fas fa-chevron-right text-gray-300"></i>
                        `;
                        searchResults.appendChild(a);
                    });
                    
                    searchResults.style.display = 'block';
                })
                .catch(error => console.error('Error:', error));
        }, 300);
    });

    // Ocultar resultados al hacer clic fuera
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });
});
</script>

                        <!-- Botones de Acción -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center mt-4">
                            <button type="button" class="btn btn-primary btn-lg mx-2 mb-3 mb-sm-0 shadow-sm" style="border-radius: 30px; padding: 10px 30px;">
                                <i class="fas fa-notes-medical mr-2"></i> Ver Consultas
                            </button>
                            <button type="button" class="btn btn-success btn-lg mx-2 shadow-sm" style="border-radius: 30px; padding: 10px 30px;">
                                <i class="fas fa-plus-circle mr-2"></i> Nuevo Paciente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
