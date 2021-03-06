<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CV SIMPATI</title>
    <link href="{{url('/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{url('/')}}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{url('/')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('lte/preloader.css')}}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <livewire:styles />

    <livewire:scripts />


</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APLIKASI PENGGAJIAN CV SIMPATI</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link " href="{{url('home')}}">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>
            @if (auth()->user()->level == 1)

            <div class="sidebar-heading my-0">
                ADMIN
            </div>
            <hr class="sidebar-divider">

            <li class="nav-item {{ request()->is('anggota') ? 'active' : '' }}">
                <a class="  nav-link" href="{{url('/anggotax')}}">
                    <i class="fa fa-male"></i>
                    <span>Data Karyawan</span></a>
            </li>
            <li class="nav-item {{ request()->is('gaji') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/gaji')}}">
                    <i class="fa fa-coins"></i>
                    <span>Data Gaji</span></a>
            </li>
            <li class="nav-item {{ request()->is('jabatan') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('jabatan')}}">
                    <i class="fa fa-suitcase"></i>
                    <span>Data Jabatan</span></a>
            </li>

            <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/user')}}">
                    <i class="fa fa-users"></i>
                    <span>Data User</span></a>
            </li>
            @endif


            @if (auth()->user()->level == 2)


            <div class="sidebar-heading">
                USER
            </div>
            <li class="nav-item {{ request()->is('anggotas') ? 'active' : '' }}">
                <a class="  nav-link" href="{{url('/anggotas')}}">
                    <i class="fa fa-male"></i>
                    <span>Daftar Profil</span></a>
            </li>
            <li class="nav-item {{ request()->is('gajis') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/gajis')}}">
                    <i class="fa fa-coins"></i>
                    <span>Daftar Gaji</span></a>
            </li>
            <li class="nav-item {{ request()->is('jabatans') ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/jabatans')}}">
                    <i class="fa fa-suitcase"></i>
                    <span>Daftar Jabatan</span></a>
            </li>
            @endif



            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                                <img class="img-profile rounded-circle" src="{{url('img/undraw_profile.svg')}}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href=" Auth::routes('logout')" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                @yield('container')
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        <button id="logout-form" type="submit" class="btn btn-primary">Logout</a>
                            @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="div-loading">
        <div id="loader" style="display: none;"></div>
    </div>
    <script src="{{url('/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{url('/')}}/js/sb-admin-2.min.js"></script>
    <script src="{{url('/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/js/demo/datatables-demo.js"></script>
    <script src="{{asset('js/input.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('footer')
</body>

</html>