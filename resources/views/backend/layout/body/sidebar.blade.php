<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @can('viewAny', App\Models\User::class)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Utilisateurs</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="bi bi-circle"></i><span>Listes des utilisateurs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.create') }}">
                        <i class="bi bi-circle"></i><span>nouveau utilisateur</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#projets-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Projets</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="projets-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('projects.index') }}">
                        <i class="bi bi-circle"></i><span>Listes des projets</span>
                    </a>
                </li>
                @can('create', App\Models\Project::class)
                <li>
                    <a href="{{ route('projects.create') }}">
                        <i class="bi bi-circle"></i><span>nouveau projet</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tasks-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Taches</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tasks-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('tasks.index') }}">
                        <i class="bi bi-circle"></i><span>Listes des taches</span>
                    </a>
                </li>
                @can('create', App\Models\Task::class)
                <li>
                    <a href="{{ route('tasks.create') }}">
                        <i class="bi bi-circle"></i><span>nouveau tache</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
    </ul>
</aside>
