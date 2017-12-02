<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    <h1>{{ studly_case(config('app.name')) }}</h1>
                </a>

                <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
                </button>
            </div>
            <div class="navbar-menu">
                <div class="navbar-end">
                    @guest
                        <a href="{{ route('login') }}" class="navbar-item">Login</a>
                        <div class="navbar-item">
                            <a href="{{ route('register') }}" class="button is-primary">
                                Join us!
                            </a>
                        </div>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="#" class="navbar-link">User</a>
                            <div class="navbar-dropdown is-boxed">
                                <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
