@extends('main')
@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-heading">{{ $title }}</h1>
            <p class="text-sm text-muted mt-1">Lista pokoi hotelowych</p>
        </div>
        <a href="/rooms/create" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold shrink-0">+ Dodaj pokój</a>
    </div>

    <form action="/rooms" method="get" class="bg-surface border border-border rounded-2xl shadow-sm p-5 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-semibold text-heading mb-1.5">Szukaj (nazwa, numer)</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="np. 101" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-heading mb-1.5">ID hotelu</label>
                <input type="text" name="hotel_id" value="{{ request('hotel_id') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-heading mb-1.5">Min. pojemność</label>
                <input type="number" name="capacity_min" value="{{ request('capacity_min') }}" min="1" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
            </div>
        </div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Szukaj</button>
        <a href="/rooms" class="text-muted hover:text-heading text-sm font-medium ml-3">Wyczyść filtry</a>
    </form>

    <div class="bg-surface border border-border rounded-2xl shadow-sm overflow-hidden">
        @forelse ($rooms as $room)
            <div class="p-5 border-b border-border last:border-b-0 hover:bg-page/50 transition-colors">
                <div class="flex flex-wrap items-start justify-between gap-2">
                    <h2 class="text-lg font-bold text-heading">{{ $room->name }} <span class="text-muted font-normal text-base">nr {{ $room->room_number }}</span></h2>
                    <span class="text-sm font-semibold text-brand">{{ $room->price_per_night }} zł/noc</span>
                </div>
                @if($room->description)<p class="text-muted text-sm mt-2">{{ $room->description }}</p>@endif
                <p class="text-muted text-sm mt-1">Hotel #{{ $room->hotel_id }} · {{ $room->capacity }} os.</p>
                @if($room->amenityRooms->count())
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($room->amenityRooms as $amenityRoom)
                            <span class="px-2.5 py-0.5 rounded-md text-xs font-semibold bg-page text-muted">{{ $amenityRoom->amenity->name }}</span>
                        @endforeach
                    </div>
                @endif
                <div class="mt-3 flex flex-wrap gap-4 text-sm">
                    <a href="/rooms/edit/{{ $room->id }}" class="text-brand font-semibold hover:text-brand-dark">Edytuj</a>
                    <a href="/rooms/add-amenity/{{ $room->id }}" class="text-muted font-semibold hover:text-heading">Udogodnienia</a>
                    <form action="/rooms/delete/{{ $room->id }}" method="post" class="inline">@csrf @method('DELETE')<button type="submit" class="text-danger font-semibold hover:opacity-80">Usuń</button></form>
                </div>
            </div>
        @empty
            <p class="p-8 text-center text-muted">Brak pokoi spełniających kryteria.</p>
        @endforelse
    </div>
@endsection
