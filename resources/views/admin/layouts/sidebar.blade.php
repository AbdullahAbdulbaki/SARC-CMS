<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('/img/sarc.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <a  href="#" role="button" >
            {{ Auth::user()->name }}
        </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Programs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.programs.all') }}" class="nav-link">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>List all SARC services</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Donors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.donors.all') }}" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>List all SARC Donors</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('locations/cities/all')}}" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Cities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('locations/regions/all')}}" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Regions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('locations/districts/all')}}" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('locations/areas/all')}}" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Areas</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('locations/types/all')}}" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Locations Type</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Unit Address</p>
                </a>
              </li>

            </ul>
          </li>
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
                <a href="{{url('nationalities/all')}}" class="nav-link">
                  <i class="far fa-flag nav-icon"></i>
                  <p>List All Nationality</p>
                </a>
              </li>

            </ul>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon 	fas fa-hospital"></i>
              <p>
                Medical Points
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-hospital nav-icon"></i>
                  <p>List Medical Points</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Clinics
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-building nav-icon"></i>
                  <p>Medical Points Clinics</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Medical Stuff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Medical Points Stuff</p>
                </a>
              </li>

            </ul>
          </li>
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
                    <a href="{{url('diseasescat/all')}}" class="nav-link">
                      <i class="fa fa-list nav-icon"></i>
                      <p>List Diseases Category</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{url('diseases/all')}}" class="nav-link">
                  <i class="fa fa-disease nav-icon"></i>
                  <p>List All Diseases</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>
                  Medical Services
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('mservices/all')}}" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>List All Medical Services</p>
                  </a>
                </li>

              </ul>
          </li>
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
                <a href="{{url('labtest/all')}}" class="nav-link">
                  <i class="fa fa-flask nav-icon"></i>
                  <p>List All Lab Test</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-x-ray"></i>
              <p>
                X-Ray
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('xray/all')}}" class="nav-link">
                  <i class="fa fa-x-ray nav-icon"></i>
                  <p>List All X-ray</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Age Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('Agecategorygroup/all') }}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Age Categories Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('Agegroupelement/all') }}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Age Group Elements</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-capsules"></i>
              <p>
                Medicines
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('Medicines/all') }}" class="nav-link">
                  <i class="fa fa-capsules nav-icon"></i>
                  <p>List All Sarc Medicines</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('Form/all') }}" class="nav-link">
                  <i class="fa fa-capsules nav-icon"></i>
                  <p>List   Medicines Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('Categories/all') }}" class="nav-link">
                  <i class="fa fa-capsules nav-icon"></i>
                  <p>List  Medicines Categories</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fas fa-calendar-alt"></i>
              <p>
                Ewars Week
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>List all Ewars Years</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.roles.all') }}" class="nav-link">
                  <i class="fas fa-user-shield nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users.all') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>users</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
