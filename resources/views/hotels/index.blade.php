@extends('main')
@section('menu')
    <a href="/hotels/create" class="text-blue-500">Create</a>
    <a href="/hotels" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{ $title }}</h1>

    <form action="/hotels" method="get" class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Szukaj (nazwa, adres)</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="np. Centrum" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Miasto</label>
                <input type="text" name="city" value="{{ request('city') }}" placeholder="np. Kraków" class="w-full border rounded px-2 py-1">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Szukaj</button>
        <a href="/hotels" class="text-zinc-600 ml-4">Wyczyść filtry</a>
    </form>

    @forelse ($hotels as $hotel)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $hotel->name }}</h1>
        <p class="text-zinc-600 text-sm">{{ $hotel->city }}, {{ $hotel->address }}</p>
        <p class="text-zinc-600 text-sm">{{ $hotel->description }}</p>
        <div>
        <a href="{{ url()->current() }}/{{ $hotel->id }}" class="text-green-500">View</a>
        <a href="/hotels/edit/{{ $hotel->id }}" class="text-blue-500">Edit</a>
        <form action="/hotels/delete/{{ $hotel->id }}" method="post" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    </div>
    </div>
    @empty
    <p class="text-zinc-600">Brak hoteli spełniających kryteria wyszukiwania.</p>
    @endforelse
@endsection
