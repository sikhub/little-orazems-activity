@extends('layouts.main')

@section('content')

    <img src="{{ asset('images/orazem.png') }}" class="text-center img-responsive" style="margin: 0 auto; width: 150px;">

    <h1>Seznam dejavnosti</h1>

    <div class="list-group">
        @foreach ($activities as $activity)
            <a href="{{ route('schedule', ['activity' => $activity->slug]) }}" class="list-group-item">{{ $activity->name }}</a>
        @endforeach
    </div>

@endsection