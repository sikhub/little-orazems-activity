@extends('layouts.main')

@section('content')
    <h1>{{ $activity->name }}</h1>

    <ul class="list-group">
        @forelse ($schedules as $schedule)
            <li class="list-group-item">{{ \Carbon\Carbon::parse($schedule->activity_start)->format('d.m.Y \ob H:i:s') }}</li>
        @empty
            <li class="list-group-item">Trenutno za to aktivnost ni razpisanih datumov.</li>
        @endforelse
    </ul>
@endsection