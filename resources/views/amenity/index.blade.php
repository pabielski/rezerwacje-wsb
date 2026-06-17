@extends('main')
@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-heading">{{ $title }}</h1>
            <p class="text-sm text-muted mt-1">Wyposażenie pokoi</p>
        </div>
        <a href="/amenities/create" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold shrink-0">+ Dodaj udogodnienie</a>
    </div>

    <form action="/amenities" method="get" class="bg-surface border border-border rounded-2xl shadow-sm p-5 mb-6">
        <div class="mb-4">
            <label class="block text-sm font-semibold text-heading mb-1.5">Szukaj (nazwa, opis)</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="np. WiFi" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
        </div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Szukaj</button>
        <a href="/amenities" class="text-muted hover:text-heading text-sm font-medium ml-3">Wyczyść filtry</a>
    </form>

    <div class="bg-surface border border-border rounded-2xl shadow-sm overflow-hidden">
        @forelse ($amenities as $amenity)
            <div class="p-5 border-b border-border last:border-b-0 hover:bg-page/50 transition-colors">
                <h2 class="text-lg font-bold text-heading">{{ $amenity->name }}</h2>
                <p class="text-muted text-sm mt-1">{{ $amenity->description }}</p>
                <div class="mt-3 flex gap-4 text-sm">
                    <a href="/amenities/edit/{{ $amenity->id }}" class="text-brand font-semibold hover:text-brand-dark">Edytuj</a>
                    <form action="/amenities/delete/{{ $amenity->id }}" method="post" class="inline">@csrf @method('DELETE')<button type="submit" class="text-danger font-semibold hover:opacity-80">Usuń</button></form>
                </div>
            </div>
        @empty
            <p class="p-8 text-center text-muted">Brak wyposażenia.</p>
        @endforelse
    </div>
@endsection
