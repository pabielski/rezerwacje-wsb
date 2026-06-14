@extends('main')
@section('menu')
    <a href="/rooms/create" class="text-blue-500">Create</a>
    <a href="/rooms" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>

    <form action="/rooms" method="get" class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Szukaj (nazwa, numer)</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="np. 101" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">ID hotelu</label>
                <input type="text" name="hotel_id" value="{{ request('hotel_id') }}" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Min. pojemność</label>
                <input type="number" name="capacity_min" value="{{ request('capacity_min') }}" min="1" class="w-full border rounded px-2 py-1">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Szukaj</button>
        <a href="/rooms" class="text-zinc-600 ml-4">Wyczyść filtry</a>
    </form>

    @forelse ($rooms as $room)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $room->name }} ({{ $room->room_number }})</h1>
        <p class="text-zinc-600 text-sm">{{ $room->description }}</p>
        <p class="text-zinc-600 text-sm">Hotel ID: {{ $room->hotel_id }} | Pojemność: {{ $room->capacity }}</p>
        @foreach($room->amenityRooms as $amenityRoom)
    <p>{{ $amenityRoom->amenity->name }}</p>
@endforeach
        <div>
        <a href="{{ url()->current() }}/{{ $room->id }}" class="text-green-500">View</a>
        <a href="/rooms/edit/{{ $room->id }}" class="text-blue-500">Edit</a>
        <a href="{{ url()->current() }}/delete/{{ $room->id }}" class="text-red-500">Delete</a>
        <a href="/rooms/add-amenity/{{ $room->id }}" class="text-purple-500">
    Add amenity
</a>
    </div>
    </div>
    @empty
    <p class="text-zinc-600">Brak pokoi spełniających kryteria wyszukiwania.</p>
    @endforelse
@endsection
