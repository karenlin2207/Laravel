<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.print.min.css') }}" media="print" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')
</head>
<body>
<div id="app">
    <header class="box-shadow">
        <a href="{{ route('index.schedule') }}">
            <img src="{{ asset('img/logo.png') }}" style="position: absolute;bottom: 0px;left: 6%;" border="0">
        </a>
        <nav>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                    <li style="border-right: 1px solid #ffffff; height: 25px;">
                        <a href="{{ route('tasks.index') }}">
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li><a href="{{}}"></a></li>
                    <li><a href="{{}}"></a></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            登出
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </nav>
    </header>
    @include('layouts.message')
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('js/lib/moment.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/lib/vue.min.js') }}"></script>
<script src="{{ asset('js/lib/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
</script>
@yield('script')
</body>
</html>
