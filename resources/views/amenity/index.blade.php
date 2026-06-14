@extends('main')
@section('menu')
    <a href="/amenities/create" class="text-blue-500">Create</a>
    <a href="/amenities" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>

    <form action="/amenities" method="get" class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <div class="mb-4">
            <label class="block text-sm text-zinc-600 mb-1">Szukaj (nazwa, opis)</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="np. WiFi" class="w-full border rounded px-2 py-1">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Szukaj</button>
        <a href="/amenities" class="text-zinc-600 ml-4">Wyczyść filtry</a>
    </form>

    @forelse ($amenities as $amenity)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $amenity->name }}</h1>
        <p class="text-zinc-600 text-sm">{{ $amenity->description }}</p>
        <div>
        <a href="{{ url()->current() }}/{{ $amenity->id }}" class="text-green-500">View</a>
        <a href="/amenities/edit/{{ $amenity->id }}" class="text-blue-500">Edit</a>
        <form action="/amenities/delete/{{ $amenity->id }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500">Delete</button>
</form>
    </div>
    </div>
    @empty
    <p class="text-zinc-600">Brak wyposażenia spełniającego kryteria wyszukiwania.</p>
    @endforelse
@endsection
