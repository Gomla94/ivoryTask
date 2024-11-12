<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header">Quick links</div>
                            <div class="card-body">
                                @can('students.view_all')
                                <p><a style="text-decoration: none" href="{{ route('students.index') }}">Students</a></p>
                                @endcan
                                @can('teachers.view_all')
                                <p><a style="text-decoration: none" href="{{ route('teachers.index') }}">Teachers</a></p>
                                @endcan
                                @can('roles.view_all')
                                <p><a style="text-decoration: none" href="{{ route('roles.index') }}">Roles</a></p>
                                @endcan
                                @can('messages.view_all')
                                <p><a style="text-decoration: none" href="{{ route('messages.index') }}">Messages</a></p>
                                @endcan
                                <p><a style="text-decoration: none" href="{{ route('own-messages.index') }}">My messages</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        @if(Session::has('success'))
                            <div class="row alert-message" style="display:flex;align-items:center;justify-content:center">
                                <div class="col-md-6" style="margin-top:1rem;text-align: center;">
                                    <div class="alert alert-success alert-dismissable">
                                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                    {{ Session::get('success') }}
                                    </div>
                                </div>  
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="row alert-message" style="display:flex;align-items:center;justify-content:center">
                                <div class="col-md-6" style="margin-top:1rem;text-align: center;">
                                    <div class="alert alert-danger alert-dismissable">
                                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                    {{ Session::get('error') }}
                                    </div>
                                </div>  
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>                
            </div>
        </main>
    </div>
</body>
<script>
    const alertDiv = document.querySelector('.alert-message');
    if(alertDiv) {
        setTimeout(() => {
            alertDiv.remove();
        }, 1000);
    }
</script>
</html>
