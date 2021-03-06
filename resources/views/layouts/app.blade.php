<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ asset('app.name', 'Prudevolts') }}</title> --}}
    <title>Prudevolts'</title>

    <!-- Scripts -->
    {{-- <script src="{{asset("bootstrap/jquery.min.js")}}" defer></script> --}}
     
     
     {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      --}}
      <script src="{{asset("bootstrap/jss/jquery-3.2.1.slim.min.js")}}" ></script>
      {{-- <script src="{{asset("bootstrap/jss/popper.min.js")}}" ></script> --}}
      {{-- <script src="{{asset("bootstrap/jss/collapse.js")}}" ></script> --}}
      {{-- <script src="{{asset("bootstrap/jss/dropdown.js")}}" ></script>  --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    --}}
    

    <!-- Styles -->
    <link href="{{ ('resources/sass/app.scss') }}" rel="stylesheet">
    <link href="{{asset("bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("bootstrap/css/bootstrap-grid.min.css")}}" rel="stylesheet">
  
  
</head>
<body background="{{asset("production/images/fondo_login3.jpg")}}">
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-ligth shadow-sm"> --}}
        <nav class="navbar navbar-expand-md navbar-light bg-ligth shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Prudevolts') }} --}} Prudevolts
                </a>
                <button class="nav navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggle-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    {{-- </div> --}}
        <main class="py-4">
            @yield('content')
        </main>
        <script src="{{asset("bootstrap/js/bootstrap.min.js")}}" ></script>
        <script src="{{asset("bootstrap/js/bundle.min.js")}}" ></script>
</body>
</html>
