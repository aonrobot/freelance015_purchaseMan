<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TLE Purchase Management</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">  
    <link rel="stylesheet" href="{{asset('public/css/bootflat.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/jquery.dataTables.min.css')}}">

    @stack('css')

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Purchase Management
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::check())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/customer') }}">Customers</a></li>
                    <li><a href="{{ url('/product') }}">Products</a></li>
                    <li><a href="{{ url('/order') }}">Order</a></li>
                </ul>
                @else
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{asset('public/js/jquery.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @stack('scripts')
</body>
</html>
