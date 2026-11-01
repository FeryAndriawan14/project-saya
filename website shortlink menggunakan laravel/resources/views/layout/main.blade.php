<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard PUSDATIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Framework -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify icon -->
    <link rel="stylesheet" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect" id="mobile-collapse" href="#!"><i class="ti-menu"></i></a>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="main-menu-header text-center" style="padding: 20px 0;">
                                <img class="img-radius" src="{{ asset('assets/images/kementerian.jpg') }}" 
                                     alt="User-Profile" 
                                     style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                                <div class="user-details mt-3">
                                    <span>PUSDATIN</span>
                                </div>
                            </div>
                            
                            <div class="pcoded-navigation-label">MENU</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active"><a href="{{ route('dashboard') }}"><span class="pcoded-micon"><i class="ti-home"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>
                                <li><a href="{{ route('urls.create') }}"><span class="pcoded-micon"><i class="ti-link"></i></span><span class="pcoded-mtext">Input URL</span></a></li>
                                <li><a href="{{ route('myurl.index') }}"><span class="pcoded-micon"><i class="ti-folder"></i></span><span class="pcoded-mtext">My URL</span></a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="p-3">
                                        @csrf
                                        <button type="submit" style="border:none; background:none; color: #ff5252; cursor:pointer; width:100%; text-align:left;">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/vertical-layout.min.js') }}"></script>
</body>
</html>