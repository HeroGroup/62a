<style>
    .navbar-nav > .sidebar-brand {
        height:9rem;
    }
    .toggled > .sidebar-brand {
        height:3rem;
    }
</style>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('site.index')}}">
        <img src="/images/Logo.png" alt="62&#xb0; Architecture" style="width:100%;" />
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="dashboard">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item" id="landing">
        <a class="nav-link" href="{{route('admin.landing.index')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Site Landing</span></a>
    </li>

    <li class="nav-item" id="projects">
        <a class="nav-link" href="{{route('admin.projects.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Projects</span></a>
    </li>

    <li class="nav-item" id="aboutUs">
        <a class="nav-link" href="{{route('admin.aboutUs.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>About Us (Members)</span></a>
    </li>

    <li class="nav-item" id="administrators">
        <a class="nav-link" href="{{route('admin.users.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Administrators</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
    var active = "{{$active}}";
    document.getElementById(active).classList.add("active");
</script>
<!-- End of Sidebar -->
