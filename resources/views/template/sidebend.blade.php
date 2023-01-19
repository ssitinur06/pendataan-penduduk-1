<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <span class="mr-2 d-none d-lg-inline text-gray-100 small"></span>
    <img class="img-profile rounded-circle"
        src="/template/img/penduduk.jpg">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard 
                @if (auth()->user()->level === 1)
                Ketua RT
                @endif
                @if (auth()->user()->level === 2)
                Sekretaris 
                @endif
                @if (auth()->user()->level === 3)
                Bendahara
                @endif    
            </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA
    </div>





    <!-- Nav Item - Keuangan Collapse Menu -->
    @if (auth()->user()->level = 1 && 3)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-sack-dollar"></i>
            <span>Pembayaran</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pembayaran</h6>
                <a class="collapse-item" href="/iuranbulanan">Iuran Bulanan</a>
                <a class="collapse-item" href="/iurankematian">Iuran Kematian</a>
                <a class="collapse-item" href="/pemasukaniuranbulan">Pemasukan</a>
                <a class="collapse-item" href="/#">Pengeluaran</a>
            </div>
        </div>
    </li>
    

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/cetakiuranbulanan/{id}">
            <i class="fas fa-circle-notch"></i>
            <span>Laporan</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>