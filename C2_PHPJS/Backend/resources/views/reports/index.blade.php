@extends('layouts.app')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }} </h1>
        </div>
        <span class="h6">{{ $event->date }} </span>
    </div>

    <div class="mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h2 class="h4">Room Capacity</h2>
        </div>
        <div class="canvas" style="width:500px">
        <canvas id="myChart" width="400" height="400" style="width:400px"></canvas>
        
        </div>
    </div>
</main>
@endsection
@push('scripts')
<script>
let ctx = document.getElementById('myChart').getContext('2d');

let labels = [];
let capacities = [];
let colors = [];

@foreach($event->channels as $channel)
    @foreach($channel->sessions as $session)
        labels.push("{{$session->title}}")
        capacities.push("{{ $session->room->capacity }}")
        @if($session->registrant->count() > $session->room->capacity ) 
            colors.push("red")
        @else
            colors.push("rgba(54, 162, 235, 0.2)")
        @endif
    @endforeach
@endforeach


var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:labels,
                datasets: [{
                    label: 'Capacity',
                    data: capacities,
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
</script>
@endpush