<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <img class="img-profile rounded-circle mt-5 mx-auto"
                src="/template/img/penduduk.jpg" style="width:160px;  height:130px">

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

            <!-- Heading -->
            <div class="sidebar-heading">
                DATA
            </div>

            
            <!-- Nav Item - Pages Collapse Menu -->
            @cannot('bendahara')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="#collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Penduduk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <a class="collapse-item" href="/penduduk">Data Penduduk</a>
                        <a class="collapse-item" href="/perpindahan">Data Perpindahan</a>
                        <a class="collapse-item" href="/kematian">Data Kematian</a>
                        <a class="collapse-item" href="/kelahiran">Data Kelahiran</a>
                    </div>
                </div>
            </li>
            @endcannot


    <li class="nav-item">
        @cannot('bendahara')
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/suratpengantar">
                <i class="fa-solid fa-envelope"></i>
                <span>Surat Pengantar</span></a>
        </li>
    @endcannot
   
    @cannot('sekretaris')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

            <!-- Nav Item - Keuangan Collapse Menu -->
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-sack-dollar"></i>
                    <span>Data Iuran</span>
                </a>
                <div id="collapsepages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Iuran:</h6>
                        <a class="collapse-item" href="/iuranbulanan">Iuran Bulanan</a>
                        <a class="collapse-item" href="/iurankematian">Iuran Kematian</a>
                        <a class="collapse-item" href="/pengeluaranbulanan">Pengeluaran Iuran</a>
                        {{-- <a class="collapse-item" href="/pemasukaniuranbulan">Pemasukan</a>
                        <a class="collapse-item" href="/#">Pengeluaran</a> --}}
                    </div>
                </div>
            </li>
            

           
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan:</h6>
                        <a class="collapse-item" href="/cetakiuranbulanan/{id}">Laporan Iuran Bulanan</a>
                        <a class="collapse-item" href="/cetakiurankematian/{id}">Laporan Iuran Kematian</a>
                    </div>
                </div>
            </li>

            @endcannot

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>