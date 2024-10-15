<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EMS <sup>3</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
   
     <li class="nav-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{Auth::user()->is_admin}}
    </div>
   

    <!-- Nav Item - Pages Collapse Menu -->
  
    <li class="nav-item {{ Route::currentRouteName() === 'employees' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('employees') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Employees</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if(Auth::user()->is_admin=="Admin")
    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link " href="{{ url('products') }}" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Products</span>
        </a>
        
    </li>


    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Route::currentRouteName() === 'charts' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('charts') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>
   
    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Route::currentRouteName() === 'tables' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('tables') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
    </li>
  

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>