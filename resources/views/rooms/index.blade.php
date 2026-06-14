@extends('main')
@section('menu')
    <a href="/rooms/create" class="text-blue-500">Create</a>
    <a href="/rooms" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    @foreach ($rooms as $room)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $room->name }}</h1>
        <p class="text-zinc-600 text-sm">{{ $room->description }}</p>
        @foreach($room->amenityRooms as $amenityRoom)
    <p>{{ $amenityRoom->amenity->name }}</p>
@endforeach
        <div>
        <a href="{{ url()->current() }}/{{ $room->id }}" class="text-green-500">View</a>
        <a href="{{ url()->current() }}/edit/{{ $room->id }}" class="text-blue-500">Edit</a>
        <a href="{{ url()->current() }}/delete/{{ $room->id }}" class="text-red-500">Delete</a>
        <a href="/rooms/add-amenity/{{ $room->id }}" class="text-purple-500">
    Add amenity
</a>
    </div>
    </div>
   
    @endforeach
@endsection
