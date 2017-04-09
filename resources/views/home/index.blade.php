@extends('layouts.main')

@section('content')
    <h1>Seznam dejavnosti</h1>

    <div class="list-group">
        @foreach ($activities as $activity)
            <a href="{{ route('schedule', ['activity' => $activity->slug]) }}" class="list-group-item">{{ $activity->name }}</a>
        @endforeach
    </div>

@endsection