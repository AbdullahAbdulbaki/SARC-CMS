<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('his.home') }}" class="brand-link">
        <img src="{{ asset('/img/sarc.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SARC CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/abd.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" role="button">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Patients
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Health_system.patients.patients') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>List all Patients</p>
                            </a>
                        </li>
                    </ul>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bed"></i>
                        <p>
                            Visits
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Health_system.visits.visits') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>List all visits</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Location
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('his.location.city') }}" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>List all Cities</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('his.location.region') }}" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>List all Regions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('his.location.district') }}" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>List all Districts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('his.location.area') }}" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>List all Areas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('his.location.type') }}" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>List all Location Types</p>
                                </a>
                            </li>

                    </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            Nationality
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('his.nationality') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>List all Nationality</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-disease"></i>
                        <p>
                            Diseases
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('his.diseases') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>List all Diseases</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flask"></i>
                        <p>
                            Lab Test
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('his.labtest') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>List all Lab Test</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-x-ray"></i>
                        <p>
                            X-ray
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('his.xray') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>List all Lab X-ray</p>
                            </a>
                        </li>
                    </ul>



            </ul>



            </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
