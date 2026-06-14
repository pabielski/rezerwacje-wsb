@extends('main')
@section('menu')
    <a href="/reservations/create" class="text-blue-500">Create</a>
    <a href="/reservations" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>

    <form action="/reservations" method="get" class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Imię / nazwisko gościa</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="np. Kowalska" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Data od</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Data do</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">Status</label>
                <select name="status" class="w-full border rounded px-2 py-1">
                    <option value="">— wszystkie —</option>
                    <option value="new" @selected(request('status') === 'new')>new</option>
                    <option value="confirmed" @selected(request('status') === 'confirmed')>confirmed</option>
                    <option value="cancelled" @selected(request('status') === 'cancelled')>cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">ID pokoju</label>
                <input type="text" name="room_id" value="{{ request('room_id') }}" class="w-full border rounded px-2 py-1">
            </div>
            <div>
                <label class="block text-sm text-zinc-600 mb-1">ID użytkownika (kto utworzył)</label>
                <input type="text" name="user_id" value="{{ request('user_id') }}" class="w-full border rounded px-2 py-1">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Szukaj</button>
        <a href="/reservations" class="text-zinc-600 ml-4">Wyczyść filtry</a>
    </form>

    @forelse ($reservations as $reservation)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">Rezerwacja #{{ $reservation->id }}</h1>
        <p class="text-zinc-800">{{ $reservation->guest_first_name }} {{ $reservation->guest_last_name }}</p>
        <p class="text-zinc-600 text-sm">{{ $reservation->date_from }} — {{ $reservation->date_to }}</p>
        <p class="text-zinc-600 text-sm">Status: {{ $reservation->status }}</p>
        <div>
        <a href="{{ url()->current() }}/{{ $reservation->id }}" class="text-green-500">View</a>
        <a href="/reservations/edit/{{ $reservation->id }}" class="text-blue-500">Edit</a>
        <form action="/reservations/delete/{{ $reservation->id }}" method="post" style="display:inline;">
            @csrf
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    </div>
    </div>
    @empty
    <p class="text-zinc-600">Brak rezerwacji spełniających kryteria wyszukiwania.</p>
    @endforelse
@endsection
