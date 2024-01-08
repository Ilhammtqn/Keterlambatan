<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapitulasi Keterlambatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-straight/css/uicons-bold-straight.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
</head>
</head>
<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="navbar bg-body-tertiary fixed-top" style="box-shadow: 0 5px 30px 0 rgba(82, 63, 105, 0.2);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: rgb(44, 44, 236);"> 
                <b>Rekap Keterlambatan</b>
            </a>
            <div class="offcanvas-header">
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fi fi-sr-user"></i>
                                @if (Auth::check())
                                {{ Auth::user()->name }}
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li >
                                    <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
                                </li>    
                            </ul>                
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div>
            @yield('content1')
        </div>
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style=" position: relative; width: 83%; left: 15.5%; height: 700px; top:225px;">
            <div class="row flex-nowrap" style="top: -220px; position: relative; width: 100%;" >
                <div class="container mt-5" >
                    @yield('content')
                </div>
            </div>
        </div>
        @if (Auth::check())      
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white"  style="width: 15%; position: relative; right: 85%; top: 40px ">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <a href="/dashboard" class="nav-link px-0"><span class="ms-1 d-none d-sm-inline"><i class="fi fi-rr-apps"></i> Dashboard</span></a>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline dropdown-toggle"><i class="fi fi-rr-bars-progress"></i> Data Master</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('rombel.home') }}" class="nav-link px-0"><span class="fi fi-rs-bullet">Data Rombel</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('rayon.home')}}" class="nav-link px-0"><span class="fi fi-rs-bullet">Data Rayon</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('student.home') }}" class="nav-link px-0"><span class="fi fi-rs-bullet">Data Siswa</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('user.home') }}" class="nav-link px-0"><span class="fi fi-rs-bullet">Data User</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('late.home') }}" class="nav-link px-0 align-middle">
                            <span class="ms-1 d-none d-sm-inline"><i class="fi fi-rr-square-poll-vertical"></i> Data Keterlambatan</span></a>
                        </li>
                    </ul>
                </div>
            </div>          
        @endif 
    </nav>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('script')
</body>
</html>