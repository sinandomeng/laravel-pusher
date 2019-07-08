@extends('pusher.layout')

@section('title', 'Pusher - Notify')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Event Launched!</h3>
                <a href="{{ url('/pusher/notify') }}">Re-launch</a>
            </div>
        </div>
    </div>

@endsection
