<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title> QMS</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">




</head>

<body>

    <div class="wrapper">
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand  ml-auto" href="{{ url('/') }}">
                      QMS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('selection') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                   <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            {{-- <h5 class="mt-0 mb-0">{{ Auth::guard('admin')->user()->name }}</h5>
                            <span>{{ Auth::guard('admin')->user()->email }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                        class="badge badge-info">6</span> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                @if(auth('trainer')->check())
                    <form method="GET" action="{{ route('logout','trainer') }}">
                        @elseif(auth('admin')->check())
                            <form method="GET" action="{{ route('logout','admin') }}">
                                @elseif(auth('employee')->check())
                                    <form method="GET" action="{{ route('logout','employee') }}">
                                      @elseif(auth('auidtor')->check())
                                            <form method="GET" action="{{ route('logout','auidtor') }}">
                                        @else
                                            <form method="GET" action="{{ route('logout','web') }}">
                                                @endif

                                                @csrf
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="bx bx-log-out"></i>LOGOUT</a>
                                            </form>

            </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
                 style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 20px;" class="col-lg-10 col-md-10 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30 text-center"> Please choose Entry </h3>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-3" title="client" href="{{ route('login.show','client') }}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/student.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="auidtor" href="{{ route('login.show','auidtor') }}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/auditor.jpg')}}">
                                </a>
                                <a class="btn btn-default col-lg-2" title="Employee" href="{{ route('login.show','employee') }}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                </a>
                                 <a class="btn btn-default col-lg-2" title="tranier" href="{{ route('login.show','trainer') }}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/traner.jpg')}}">
                                </a>
                                <a class="btn btn-default col-lg-2" title="Admin" href="{{ route('login.show','admin') }}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                </a>
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>


    <!-- toastr -->
    @yield('js')
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
