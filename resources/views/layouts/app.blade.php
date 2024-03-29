<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Confesser</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('', 'Confesser') }}
                    </a>    
                    <small>beta</small>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                         @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('vote') }}">  <i class="fa fa-dot-circle-o"></i> Voting</a> 
                        
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category') }}">  <i class="fa fa-navicon"></i> Category</a> 
                        
                            </li>
                        @endif
                    </ul>
               
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="https://gist.github.com/prokawsar/e69c1c3c2ec05fe9f6e699560a0e262f" target="_blank">  <i class="fa fa-navicon"></i> Contribute to this project</a> 
                        
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-globe"></i> Notification <span class="badge badge-success">3</span>
                                </a>

                                <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Notification 1</a> 
                                    <a class="nav-link" href="#">Notification 2</a> 
                            
                                </li>
                                    
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-user"></i> {{ Auth::user()->display_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('myconfess') }}">My Confess</a> 
                            
                                </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')

    </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
