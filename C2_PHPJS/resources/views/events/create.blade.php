@extends('layouts.app')

@section('sidebar')
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Manage Events</a></li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>{{ $event->name }}</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link " href="{{ route('events.show', ['event' => $event->id]) }}">Overview</a></li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Reports</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item"><a class="nav-link" href="{{route('reports.index')}}">Room capacity</a></li>
        </ul>
    </div>
</nav>
@endsection
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Events</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="events/create.html" class="btn btn-sm btn-outline-secondary">Create new event</a>
            </div>
        </div>
    </div>
    <div class="row events">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <a href="{{ route('events.index', ['event ' => $event->id]) }}" class="btn text-left event">
                    <div class="card-body">
                        <h5 class="card-title">WorldSkills Conference 2019</h5>
                        <p class="card-subtitle">{{ $event->date }} </p>
                        <hr>
                        <p class="card-text">3,546 registrations</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

@endsection