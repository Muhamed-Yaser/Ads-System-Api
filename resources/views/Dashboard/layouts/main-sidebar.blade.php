<div id="wrapper">
    <!-- Content Wrapper -->

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            @auth('admin')
                <div class="sidebar-brand-text mx-3">Name: {{ auth()->guard('admin')->user()->name }}</div>
            @else
                <script>
                    window.location.href = "{{ route('loginPage') }}";
                </script>
            @endauth
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('Dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Ads -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Dashboard.index') }}" aria-expanded="true"
                aria-controls="collapseTwo">
                <span>All Advertisements</span>
            </a>
        </li>
        {{-- cities --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('cities') }}" aria-expanded="true" aria-controls="collapseTwo">
                <span>Cities</span>
            </a>
            {{-- Districts --}}
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('districts') }}" aria-expanded="true"
                aria-controls="collapseTwo">
                <span>Districts</span>
            </a>
        </li>

        {{-- Governorates --}}
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('groups') }}" aria-expanded="true"
                aria-controls="collapseTwo">
                <span>Governorates</span>
            </a>
        </li>

        {{-- Messages --}}
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('messages') }}" aria-expanded="true"
                aria-controls="collapseTwo">
                <span>Messages from users</span>
            </a>
        </li>

        {{-- settings (about us....) --}}
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('settings') }}" aria-expanded="true"
                aria-controls="collapseTwo">
                <span>Settings</span>
            </a>
        </li>





        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="{{ route('loginPage') }}">Login</a>
                    <a class="collapse-item" href="#">Forgot Password</a>
                    <div class="collapse-divider"></div>
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


</div>
<!-- End of Page Wrapper -->
<!-- End of Sidebar -->
