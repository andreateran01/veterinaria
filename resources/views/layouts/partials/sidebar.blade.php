<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-paw"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VETERINARIA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        CLÍNICA
    </div>

    <!-- Nav Item - Atenciones Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAtenciones"
            aria-expanded="true" aria-controls="collapseAtenciones">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Atenciones</span>
        </a>
        <div id="collapseAtenciones" class="collapse" aria-labelledby="headingAtenciones" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Nueva atención</a>
                <a class="collapse-item" href="#">Historial</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pacientes Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePacientes"
            aria-expanded="true" aria-controls="collapsePacientes">
            <i class="fas fa-fw fa-dog"></i>
            <span>Pacientes</span>
        </a>
        <div id="collapsePacientes" class="collapse" aria-labelledby="headingPacientes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">GESTIÓN DE PACIENTES:</h6>
                <a class="collapse-item" href="#">Registrar paciente</a>
                <a class="collapse-item" href="#">Listar pacientes</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        ADMINISTRACIÓN
    </div>

    <!-- Nav Item - Usuarios Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios"
            aria-expanded="true" aria-controls="collapseUsuarios">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseUsuarios" class="collapse" aria-labelledby="headingUsuarios" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Registrar usuario</a>
                <a class="collapse-item" href="#">Listar usuarios</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
