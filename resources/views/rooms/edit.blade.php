@extends('main')
@section('menu')
    <a href="/rooms/create" class="text-blue-500">Create</a>
    <a href="/rooms" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>Edit Hotel</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/rooms/update/{{ $room->id }}" method="post">
        @csrf
           <input type="text" name="name" value="{{ $room->name }}">
         <input type="text" name="hotel_id" value="{{ $room->hotel_id }}">
        <input type="text" name="description" value="{{ $room->description }}">
        <input type="text" name="room_number" value="{{ $room->room_number }}">
        <input type="text" name="capacity" value="{{ $room->capacity }}">
        <input type="text" name="price" value="{{ $room->price_per_night }}">
        <button type="submit">Save</button>
    </form>
@endsection