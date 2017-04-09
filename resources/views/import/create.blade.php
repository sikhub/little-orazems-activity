@extends('layouts.main')

@section('content')

    @if ($errors->has('csv'))
        @foreach ($errors->get('csv') as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif

    {!! Form::open(['route' => 'import.store', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('csv', 'Uvozi CSV datoteko') !!}
            {!! Form::file('csv', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Uvozi!', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection