<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('vendor/sb-admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <style>
        .card-hover:hover{
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }
    </style>
    </head>
    <body class="sb-nav-fixed" style="background: #F6F9FF;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">APP Surat Izin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/logout"><i class="fas fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @if (Auth::user()->role_id == 1)

                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a  @if(request()->route()->uri == 'dashboard') class="nav-link active" @else class="nav-link" @endif href="dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @endif

                            <div class="sb-sidenav-menu-heading">Interface</div>

                            

                            @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                                <a  @if(request()->route()->uri == 'daftar-surat-izin' || request()->route()->uri == 'daftar-surat-izin/ubah/{id}') class="nav-link  active" @else class="nav-link" @endif href="/daftar-surat-izin">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Daftar Izin <span class="badge text-bg-secondary" style="margin-left: 30px;"></span>
                                </a>
                                <a  @if(request()->route()->uri == 'daftar-cuti' ) class="nav-link  active" @else class="nav-link" @endif href="/daftar-cuti">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Daftar Cuti <span class="badge text-bg-secondary" style="margin-left: 30px;"></span>
                                </a>
                                <a  @if(request()->route()->uri == 'daftar-lembur' || request()->route()->uri == 'daftar-lembur/ubah/{id}') class="nav-link  active" @else class="nav-link" @endif href="/daftar-lembur">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Daftar Lembur <span class="badge text-bg-secondary" style="margin-left: 30px;"></span>
                                </a>
                                
                            @endif
                            @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3 )
                                <a @if(request()->route()->uri == 'surat-izin' || request()->route()->uri == 'form-izin') class="nav-link active" @else class="nav-link" @endif href="/surat-izin">
                                    <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                                    Surat Izin
                                </a>
                                @if(Auth::user()->status == 'tetap')
                                <a @if(request()->route()->uri == 'izin-cuti' || request()->route()->uri == 'form-cuti') class="nav-link active" @else class="nav-link" @endif href="/izin-cuti">
                                    <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                                    Izin Cuti
                                </a>
                                @endif
                                <a @if(request()->route()->uri == 'izin-lembur' || request()->route()->uri == 'form-lembur') class="nav-link active" @else class="nav-link" @endif href="/izin-lembur">
                                    <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                                    Izin Lembur
                                </a>
                            @endif
                            <a  @if(request()->route()->uri == 'profile' || request()->route()->uri == 'ubah/password') class="nav-link  active" @else class="nav-link" @endif href="/profile">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Profile <span class="badge text-bg-secondary" style="margin-left: 30px;"></span>
                            </a>
                            
                            @if (Auth::user()->role_id == 1)

                            <a @if(request()->route()->uri == 'users') class="nav-link active" @else class="nav-link" @endif href="/users">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Daftar User
                            </a>
                            @endif
                            @if(Auth::user()->role_id != 2)
                            <a @if(request()->route()->uri == 'data/lembur') class="nav-link collapsed active" @else class="nav-link collapsed"  @endif href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Izin</a>
                                    <a class="nav-link" href="layout-static.html">Cuti</a>
                                    <a @if(request()->route()->uri == 'data/lembur') class="nav-link active" @else class="nav-link" @endif href="/data/lembur">Lembur</a>
                                </nav>
                            </div>
                            @endif
                            
                            
                            @if (Auth::user()->role_id == 1)
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a @if(request()->route()->uri == 'daftar-pt') class="nav-link active" @else class="nav-link" @endif href="/daftar-pt">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Daftar PT
                            </a>
                            <a @if(request()->route()->uri == 'daftar-divisi') class="nav-link active" @else class="nav-link" @endif href="/daftar-divisi">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Daftar Divisi
                            </a>

                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <p style="text-transform: capitalize">{{Auth::user()->name}}</p> 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        {{ $slot }}
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('vendor/sb-admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('vendor/sb-admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('vendor/sb-admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('vendor/sb-admin/js/datatables-simple-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        @stack('formConfirmDeleteDaftarPT')
        @stack('suratIzinRadio')
        @stack('ubahPassword')
        @stack('deleteConfirm')
        @stack('izinLembur')
        @stack('modalLembur')
        @stack('daftar-surat-izin')
        @stack('daftar-surat-cuti')
    </body>
</html>
