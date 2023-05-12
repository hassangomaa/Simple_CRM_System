<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('projects.index') }}" data-toggle="collapse" data-target="#projects-menu" aria-expanded="false" aria-controls="projects-menu">
                <i class="fas fa-tasks mr-2"></i> Projects <span class="arrow"></span>
            </a>
            <ul class="submenu nav flex-column ml-3 collapse" id="projects-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.index') }}">View All Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.create') }}">Create Project</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients.index') }}" data-toggle="collapse" data-target="#clients-menu" aria-expanded="false" aria-controls="clients-menu">
                <i class="fas fa-users mr-2"></i> Clients <span class="arrow"></span>
            </a>
            <ul class="submenu nav flex-column ml-3 collapse" id="clients-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">View All Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.create') }}">Add New Client</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#settings-menu" aria-expanded="false" aria-controls="settings-menu">
                <i class="fas fa-cog mr-2"></i> Settings <span class="arrow"></span>
            </a>
            <ul class="submenu nav flex-column ml-3 collapse" id="settings-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Security</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Billing</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
