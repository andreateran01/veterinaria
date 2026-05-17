function toggleVeterinarioFields() {
    var roleSelect = document.getElementById('role');
    var vetFields = document.getElementById('veterinario_fields');
    
    if (roleSelect && vetFields) {
        if (roleSelect.value === 'veterinario') {
            vetFields.style.display = 'block';
        } else {
            vetFields.style.display = 'none';
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var roleSelect = document.getElementById('role');
    if (roleSelect) {
        roleSelect.addEventListener('change', toggleVeterinarioFields);
        toggleVeterinarioFields(); // Ejecutar al cargar la página por si hay valores cacheados
    }
});
