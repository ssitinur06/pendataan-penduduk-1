@extends('layouts.app')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat Datang di Dashboard, 
                            @if (auth()->user()->level === 1 )
                            Ketua RT
                            @endif
                            @if (auth()->user()->level === 2)
                            Sekretaris 
                            @endif
                            @if (auth()->user()->level === 3)
                            Bendahara
                            @endif
                            <script>
                                @if (Session:: has('success!'))
                              toastr.success('Selamat Datang!', 'Congrats');
                              @endif
                              </script>
                        </h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        @cannot('bendahara')
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                             
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a class="collapse-item"  href="/penduduk"><i class="fa-solid fa-people"></i>Data Penduduk</div> 
                                                <h3 class="h2 mb-0 text-gray-800">{{ $jmlh_penduduk }}</h3>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fa-solid fa-book"></i>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a class="collapse-item" href="/perpindahan">
                                                Data Perpindahan</div>
                                                <h3 class="h2 mb-0 text-gray-800">{{ $jmlh_pindah}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-sharp fa-solid fa-house"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a class="collapse-item" href="/kelahiran">
                                                Data Kelahiran</div>
                                                <h3 class="h2 mb-0 text-gray-800">{{ $jmlh_lahir}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-breastfeeding"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a class="collapse-item" href="/kematian">
                                                Data Kematian</div>
                                                <h3 class="h2 mb-0 text-gray-800"> {{$jmlh_kematian}} </h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-circle-minus"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        @endcannot

                        <!-- Content Row -->
                    <div class="row">
                        @if (auth()->user()->level === 3)
                        @can('bendahara')
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                             
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a class="collapse-item"  href="/iuranbulanan">Transaksi Hari ini</div> 
                                                <h3 class="h2 mb-0 text-gray-800"></h3>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fa-solid fa-book"></i>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a class="collapse-item" href="/#">
                                                Iuran Masuk Bulanan</div>
                                                <h3 class="h2 mb-0 text-gray-800"></h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-breastfeeding"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a class="collapse-item" href="/kematian">
                                                    Iuran Masuk Kematian</div>
                                                <h3 class="h2 mb-0 text-gray-800"> </h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-person-circle-minus"></i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        @endcan
                  

                        
                        <!-- Earnings (Monthly) Card Example -->
                        @can('bendahara')
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a class="collapse-item" href="/iuranbulanan">
                                                Laporan</div>
                                                {{-- {{ $jumlahbulan }} --}}
                                                
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-money-bill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a class="collapse-item" href="/iurankematian"> 
                                                <h6>Transaksi Iuran Kematian</h6></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-money-bill-wave"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                     
                       





                                    <!-- Content Row -->

                                    <div class="row">

                                        <!-- Area Chart -->
                                        <div class="col-xl-8 col-lg-7">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Data Statistik</h6>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink">
                                                            <div class="dropdown-header">Dropdown Header:</div>
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="chart-area">
                                                        <canvas id="myAreaChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <!-- Pie Chart -->
                                        <div class="col-xl-4 col-lg-5">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink">
                                                            <div class="dropdown-header">Dropdown Header:</div>
                                                            <a class="dropdown-item" href="#">Masuk</a>
                                                            <a class="dropdown-item" href="#">Keluar </a>
                                                            {{-- <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="chart-pie pt-4 pb-2">
                                                        <canvas id="myPieChart"></canvas>
                                                    </div>
                                                    <div class="mt-4 text-center small">
                                                        <span class="mr-2">
                                                            <i class="fas fa-circle text-primary"></i> Masuk
                                                        </span>
                                                        {{-- <span class="mr-2">
                                                            <i class="fas fa-circle text-success"></i> Social
                                                        </span> --}}
                                                        <span class="mr-2">
                                                            <i class="fas fa-circle text-info"></i> Keluar
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                @endif
                @endcan
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script>
  // chart view dasbrot
const labels = [
  'Senin',
  'Selasa',
  'Rabu',
  'Kamis',
  'Jumat',
];
const data = {
  labels: labels,
  datasets: [
    {
    label: 'Siswa Masuk',
    backgroundColor: '#0066FF',
    borderColor: '#0066FF',
    data: [20, 15, 19, 19, 11],
  },
  {
    label: "Siswa Tidak Masuk",
    backgroundColor: '#D9D9D9',
    borderColor: '#D9D9D9',
    data: [0, 5, 1, 1, 9],
  }
]''
};

const config = {
  type: 'bar',
  data: data,
  options: {}
};

</script> --}}
@endsection