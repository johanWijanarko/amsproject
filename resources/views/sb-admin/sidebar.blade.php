<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">johan</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#m_pengawas"
            aria-expanded="true" aria-controls="m_pengawas">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manajemen Pengawas</span>
        </a>
        <div id="m_pengawas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="buttons.html">Perencanaan</a>
                <a class="collapse-item" href="cards.html">Pelaksanaan</a>
                <a class="collapse-item" href="buttons.html">Pelaporan Pengawasan</a>
                <a class="collapse-item" href="cards.html">Tindak Lanjut Pengawasan</a>
                <a class="collapse-item" href="cards.html">Dashboard Pengawasan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#m_pegawai"
            aria-expanded="true" aria-controls="m_pegawai">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Manajemen Pegawai</span>
        </a>
        <div id="m_pegawai" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/pegawai">Daftar Pegawai</a>
                <a class="collapse-item" href="/pegawai/tambah">Tambah Pegawai</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#m_audit"
            aria-expanded="true" aria-controls="m_audit">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Manajemen Auditee</span>
        </a>
        <div id="m_audit" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                <a class="collapse-item" href="/audite">Daftar Auditee</a>
                <a class="collapse-item" href="/audite/tambah">Tambah Auditee</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pustaka"
            aria-expanded="true" aria-controls="pustaka">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pustaka Audit</span>
        </a>
        <div id="pustaka" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                <a class="collapse-item" href="/pustaka_prog">Pustaka Program Audit</a>
                <a class="collapse-item" href="/rfaudit">Pustaka Refrensi Audit</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#parameter"
            aria-expanded="true" aria-controls="parameter">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manajemen Parameter</span>
        </a>
        <div id="parameter" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/parameter">Parameter Pengawasan</a>
                <a class="collapse-item" href="">Parameter Pegawai</a>
                <a class="collapse-item" href="utilities-color.html">Parameter Audit</a>
                <a class="collapse-item" href="utilities-border.html">Parameter Email</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#m_aplikasi"
            aria-expanded="true" aria-controls="m_aplikasi">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manajemen Parameter</span>
        </a>
        <div id="m_aplikasi" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="utilities-color.html">Menu</a>
                <a class="collapse-item" href="utilities-border.html">Group</a>
                <a class="collapse-item" href="utilities-color.html">Daftar Pengguna</a>
                <a class="collapse-item" href="utilities-border.html">Back Up Restore Data </a>
                <a class="collapse-item" href="utilities-border.html">Log Altivitas</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>