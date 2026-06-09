@extends('main')

@section('content')
    <h1>Hotel</h1>
    @foreach ($hotels as $hotel)
        <h2>{{ $hotel->name }}</h2>
    @endforeach
@endsection