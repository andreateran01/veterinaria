<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMINISTRACIÓN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        GESTIÓN GLOBAL
    </div>

    <!-- Nav Item - Usuarios -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios y Roles</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Lista de Usuarios</a>
                <a class="collapse-item" href="#">Registrar Usuario</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Clinicas / Sedes -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSedes"
            aria-expanded="true" aria-controls="collapseSedes">
            <i class="fas fa-fw fa-building"></i>
            <span>Sedes / Clínicas</span>
        </a>
        <div id="collapseSedes" class="collapse" aria-labelledby="headingSedes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Ver Sedes</a>
                <a class="collapse-item" href="#">Añadir Sede</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        SISTEMA
    </div>

    <!-- Nav Item - Configuracion -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Ajustes Generales</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
