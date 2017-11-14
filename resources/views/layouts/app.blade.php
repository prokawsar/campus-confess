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



{{--    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





    <!-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .likeclicked{
            color:red
        }
    </style>

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
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                         @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tags') }}">Tags</a> 
                        
                            </li>
                        @endif
                    </ul>
               
                    <form class="nav navbar-nav navbar-form" id="navBarSearch" role="search">
                        <div class="form-group">
                            <div style="display:table;" class="input-group">
                                <input type="text" class="form-control" placeholder="Search any word...">
                                <span class="input-group-btn">
                                    <button class="btn btn-green" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>
                
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
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

<div id="footer">
  <div class="container">
    <p class="text-muted credit">Website built with <a href="http://laravel.com" target="_blank">Laravel</a> | <a href="/about">About</a>
    <span class="pull-right">
        <a target="_blank" href="#" title="Follow updates"><i class="fa fa-twitter fa-lg"></i></a>
        |
        <a target="_blank" href="#" title="Get the source of this site"><i class="fa fa-github fa-lg"></i></a>
    </span>
    </p>

  </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>
