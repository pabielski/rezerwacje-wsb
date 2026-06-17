@extends('main')
@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-heading">{{ $title }}</h1>
            <p class="text-sm text-muted mt-1">Wszystkie rezerwacje w systemie</p>
        </div>
        <a href="/reservations/create" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold shrink-0">+ Dodaj rezerwację</a>
    </div>

    <form action="/reservations" method="get" class="bg-surface border border-border rounded-2xl shadow-sm p-5 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Gość</label><input type="text" name="search" value="{{ request('search') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Data od</label><input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Data do</label><input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Status</label><select name="status" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"><option value="">— wszystkie —</option><option value="new" @selected(request('status') === 'new')>new</option><option value="confirmed" @selected(request('status') === 'confirmed')>confirmed</option><option value="cancelled" @selected(request('status') === 'cancelled')>cancelled</option></select></div>
            <div><label class="block text-sm font-semibold text-heading mb-1.5">ID pokoju</label><input type="text" name="room_id" value="{{ request('room_id') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
            <div><label class="block text-sm font-semibold text-heading mb-1.5">ID użytkownika</label><input type="text" name="user_id" value="{{ request('user_id') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        </div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Szukaj</button>
        <a href="/reservations" class="text-muted hover:text-heading text-sm font-medium ml-3">Wyczyść filtry</a>
    </form>

    <div class="bg-surface border border-border rounded-2xl shadow-sm overflow-hidden">
        @forelse ($reservations as $reservation)
            <div class="p-5 border-b border-border last:border-b-0 hover:bg-page/50 transition-colors">
                <div class="flex flex-wrap justify-between gap-2">
                    <h2 class="text-lg font-bold text-heading">#{{ $reservation->id }} · {{ $reservation->guest_first_name }} {{ $reservation->guest_last_name }}</h2>
                    <span class="px-2.5 py-0.5 rounded-md text-xs font-semibold bg-page text-muted">{{ $reservation->status }}</span>
                </div>
                <p class="text-muted text-sm mt-2">{{ $reservation->date_from }} — {{ $reservation->date_to }} · {{ $reservation->total_price }} zł</p>
                <div class="mt-3 flex gap-4 text-sm">
                    <a href="/reservations/edit/{{ $reservation->id }}" class="text-brand font-semibold hover:text-brand-dark">Edytuj</a>
                    <form action="/reservations/delete/{{ $reservation->id }}" method="post" class="inline">@csrf<button type="submit" class="text-danger font-semibold hover:opacity-80">Usuń</button></form>
                </div>
            </div>
        @empty
            <p class="p-8 text-center text-muted">Brak rezerwacji.</p>
        @endforelse
    </div>
@endsection
