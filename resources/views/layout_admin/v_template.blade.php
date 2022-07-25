<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('title')}}/title.png" type="image/title-icon">
    <title>Artech | Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/home">Artech Design</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">                            
                        </li>

                    @if(auth()->user()->level == 2)
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="notification-list" style="overflow: hidden; width: auto; height: 250px;">
                                        <div class="list-group">
                                            @foreach($koclok as $data)
                                                <a href="{{route('validasi.desainer', $data->id)}}" class="list-group-item list-group-item-action active">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="{{ url('foto/'. $data->user->foto )}}" alt="" class="user-avatar-md rounded-circle"></div>
                                                        <div class="notification-list-user-block">Pesanan masuk dari <span class="notification-list-user-name">{{$data->user->name}}</span>                                                           
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach                                           
                                        </div>
                                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>                                
                            </ul>
                        </li>
                    @endif
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('foto/'. Auth::user()->foto)}}" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                    <span class="status"></span><span class="ml-auto">{{ Auth::user()->email }}</span>
                                </div>
                                <div class="option">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </div>
                                    <div class="option-list">
                                <a class="dropdown-item" href="/ubah-password"><i class="fas fa-user mr-2"></i>My Profile</a>
                                <button type="submit" class="btn dropdown-item"><i class="fas fa-power-off mr-2"></i>Logout</button>
                            </div>
                            </div>
                        </li>
                    </form>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        @include('layout_admin.v_nav')
                    </div>
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
            @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('template')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{asset('template')}}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{asset('template')}}/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="{{asset('template')}}/assets/libs/js/main-js.js"></script>
</body>
</html>