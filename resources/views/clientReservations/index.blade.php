@extends('main')

@section('menu')
    <a href="/my-reservations/create" class="text-blue-500">Nowa rezerwacja</a>
    <a href="/my-reservations" class="text-blue-500">Moje rezerwacje</a>
@endsection

@section('content')
    <h1>{{ $title }}</h1>

    <p><a href="/my-reservations/create" class="text-blue-500">Dodaj nową rezerwację</a></p>

    @forelse ($reservations as $reservation)
        <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
            <h2 class="text-xl font-bold">Rezerwacja #{{ $reservation->id }}</h2>
            <p>{{ $reservation->guest_first_name }} {{ $reservation->guest_last_name }}</p>
            <p class="text-zinc-600 text-sm">{{ $reservation->date_from }} — {{ $reservation->date_to }}</p>
            <p class="text-zinc-600 text-sm">Pokój ID: {{ $reservation->room_id }}</p>
            <p class="text-zinc-600 text-sm">Cena: {{ $reservation->total_price }} zł</p>
            <p class="text-zinc-600 text-sm">Status: {{ $reservation->status }}</p>
        </div>
    @empty
        <p class="text-zinc-600">Nie masz jeszcze żadnych rezerwacji.</p>
    @endforelse
@endsection
