@extends('main')
@section('menu')
    <a href="/reservations/create" class="text-blue-500">Create</a>
    <a href="/reservations" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    <form action="/reservations/update/{{ $reservation->id }}" method="post">
        @csrf
       <input type="date" name="date_from" value="{{ $reservation->date_from }}">
        <input type="date" name="date_to" value="{{ $reservation->date_to }}">
        <input type="text" name="room_id" value="{{ $reservation->room_id }}">
        <input type="text" name="user_id" value="{{ $reservation->user_id }}">
        <input type="text" name="total_price" value="{{ $reservation->total_price }}">
        <button type="submit">Save</button>
    </form>
@endsection