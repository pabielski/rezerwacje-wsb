@extends('main')
@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-heading">{{ $title }}</h1>
            <p class="text-sm text-muted mt-1">Twoje aktywne rezerwacje</p>
        </div>
        <a href="/my-reservations/create" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold shrink-0">+ Nowa rezerwacja</a>
    </div>

    <div class="bg-surface border border-border rounded-2xl shadow-sm overflow-hidden">
        @forelse ($reservations as $reservation)
            <div class="p-5 border-b border-border last:border-b-0 hover:bg-page/50 transition-colors">
                <div class="flex flex-wrap justify-between gap-2">
                    <h2 class="text-lg font-bold text-heading">Rezerwacja #{{ $reservation->id }}</h2>
                    <span class="px-2.5 py-0.5 rounded-md text-xs font-semibold bg-brand-light/50 text-brand-dark">{{ $reservation->status }}</span>
                </div>
                <p class="text-heading mt-2 font-medium">{{ $reservation->guest_first_name }} {{ $reservation->guest_last_name }}</p>
                <p class="text-muted text-sm mt-1">{{ $reservation->date_from }} — {{ $reservation->date_to }}</p>
                <p class="text-muted text-sm">Pokój #{{ $reservation->room_id }} · <span class="text-brand font-semibold">{{ $reservation->total_price }} zł</span></p>
            </div>
        @empty
            <div class="p-10 text-center">
                <p class="text-muted mb-4">Nie masz jeszcze żadnych rezerwacji.</p>
                <a href="/my-reservations/create" class="text-brand font-semibold hover:text-brand-dark">Złóż pierwszą rezerwację →</a>
            </div>
        @endforelse
    </div>
@endsection
