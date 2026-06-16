@extends('main')

@section('menu')
    <a href="/my-reservations/create" class="text-blue-500">Nowa rezerwacja</a>
    <a href="/my-reservations" class="text-blue-500">Moje rezerwacje</a>
@endsection

@section('content')
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/my-reservations/add-to-database" method="post">
        @csrf

        <select name="room_id">
            <option value="">Wybierz pokój</option>
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}" @selected(old('room_id') == $room->id)>
                    {{ $room->name }} (nr {{ $room->room_number }}) — {{ $room->price_per_night }} zł/noc
                </option>
            @endforeach
        </select>

        <input type="date" name="date_from" value="{{ old('date_from') }}">
        <input type="date" name="date_to" value="{{ old('date_to') }}">

        <input type="text" name="guest_first_name" value="{{ old('guest_first_name') }}" placeholder="Imię">
        <input type="text" name="guest_last_name" value="{{ old('guest_last_name') }}" placeholder="Nazwisko">
        <input type="email" name="guest_email" value="{{ old('guest_email') }}" placeholder="Email">
        <input type="text" name="guest_phone" value="{{ old('guest_phone') }}" placeholder="Telefon">

        <button type="submit">Zarezerwuj</button>
    </form>
@endsection
