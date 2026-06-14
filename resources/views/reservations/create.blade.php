@extends('main')
@section('menu')
    <a href="/reservations/create" class="text-blue-500">Create</a>
    <a href="/reservations" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    <form action="/reservations/add-to-database" method="post">
        @csrf
        <input type="text" name="guest_first_name" value="{{ old('guest_first_name', $reservation->guest_first_name) }}" placeholder="Imię gościa">
        <input type="text" name="guest_last_name" value="{{ old('guest_last_name', $reservation->guest_last_name) }}" placeholder="Nazwisko gościa">
        <input type="email" name="guest_email" value="{{ old('guest_email', $reservation->guest_email) }}" placeholder="Email gościa">
        <input type="text" name="guest_phone" value="{{ old('guest_phone', $reservation->guest_phone) }}" placeholder="Telefon gościa">
        <input type="date" name="date_from" value="{{ $reservation->date_from }}">
        <input type="date" name="date_to" value="{{ $reservation->date_to }}">
        <input type="text" name="room_id" value="{{ $reservation->room_id }}" placeholder="ID pokoju">
        <input type="text" name="user_id" value="{{ $reservation->user_id }}" placeholder="ID użytkownika (kto utworzył)">
        <input type="text" name="total_price" value="{{ $reservation->total_price }}">
        <button type="submit">Create</button>
    </form>
@endsection
