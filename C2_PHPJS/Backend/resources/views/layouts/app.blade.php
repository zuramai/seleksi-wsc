<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

    <base href="../">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom styles -->
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('chartjs/Chart.min.css')}}">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="events/index.html">Event Platform</a>
    <span class="navbar-organizer w-100">{{Auth::user()->name}}</span>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" id="logout" href="" onclick="document.getElementById('logout-form').submit()">Sign out</a>
            <form action="{{route('logout')}}" method="POST" id='logout-form'>
                @csrf
            </form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        @yield('sidebar', \View::make('layouts/defaultSidebar'))
        

       @yield('content')
    </div>
</div>
<script src="{{asset('chartjs/Chart.min.js')}}"></script>
@stack('scripts')
</body>
</html>
