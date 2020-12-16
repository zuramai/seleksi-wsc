@extends('layouts.app')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }} </h1>
        </div>
    </div>

    <form method="POST" class="needs-validation" novalidate action="{{ route('events.update', ['event' => $event->id]) }}">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputName">Name</label>
                <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputName" placeholder="" value="{{$event->name}}">
                <div class="invalid-feedback">
                    Name is required.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputSlug">Slug</label>
                <input type="text" name="slug" class="form-control" id="inputSlug" placeholder="" value="{{$event->slug}}">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputDate">Date</label>
                <input type="text"
                        class="form-control"
                        id="inputDate"
                        name="date"
                        placeholder="yyyy-mm-dd"
                        value="{{$event->date}}">
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{{ route('events.index', ['event' => $event->id]) }}" class="btn btn-link">Cancel</a>
    </form>

</main>
@endsection