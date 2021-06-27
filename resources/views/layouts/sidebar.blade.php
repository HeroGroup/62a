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
    <li class="nav-item" id="landing">
        <a class="nav-link" href="{{route('admin.landing.index')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Site Landing</span>
        </a>
    </li>

    <li class="nav-item" id="categories">
        <a class="nav-link" href="{{route('admin.categories.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Categories</span>
        </a>
    </li>

    <li class="nav-item" id="projects">
        <a class="nav-link" href="{{route('admin.projects.index')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Projects</span>
        </a>
    </li>

    <li class="nav-item" id="aboutUs">
        <a class="nav-link" href="{{route('admin.aboutUs.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>About Us</span>
        </a>
    </li>

    <li class="nav-item" id="teamMembers">
        <a class="nav-link" href="{{route('admin.teamMembers.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Team Members</span>
        </a>
    </li>

    <li class="nav-item" id="contactUs">
        <a class="nav-link" href="{{route('admin.contactUs.index')}}">
            <i class="fas fa-fw fa-phone"></i>
            <span>Contact Us</span>
            <span id="new-message" style="color:rgb(56,200,139);font-size:10px;padding:2px 3px;border:1px solid rgb(56,200,139);border-radius:5px;display:none;">New Message</span>
        </a>
    </li>

    <li class="nav-item" id="officeDetails">
        <a class="nav-link" href="{{route('admin.officeDetails.index')}}">
            <i class="fas fa-fw fa-building"></i>
            <span>Office Details </span>
        </a>
    </li>

    <li class="nav-item" id="whatWeDo">
        <a class="nav-link" href="{{route('admin.whatWeDo.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>What We Do</span>
        </a>
    </li>

    <li class="nav-item" id="administrators">
        <a class="nav-link" href="{{route('admin.users.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Administrators</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
    window.onload = function() {
        var active = "{{$active}}";
        document.getElementById(active).classList.add("active");

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "{{route('admin.contactUs.newMessages')}}");
        xhr.addEventListener("load", function () {
            var response = JSON.parse(xhr.response);
            if (response.status === 1 && response.data > 0)
                document.getElementById('new-message').style.display = "inline-block";
        });
        xhr.send();
    }
</script>
<!-- End of Sidebar -->
