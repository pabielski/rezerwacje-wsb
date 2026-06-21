@extends('main')
@section('content')
    <div class="mb-6">
        <a href="/rooms" class="text-sm text-muted hover:text-brand font-medium">← Lista pokoi</a>
        <h1 class="text-2xl font-bold text-heading mt-2">Edytuj pokój</h1>
    </div>
    @if ($errors->any())<ul class=" list-none text-danger text-sm rounded-xl px-4 py-3 mb-4 ">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
    <form action="/rooms/update/{{ $room->id }}" method="post" class="bg-surface border border-border rounded-2xl shadow-sm p-6 max-w-xl space-y-4">
        @csrf
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Nazwa</label><input type="text" name="name" value="{{ old('name', $room->name) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div>
            <label class="block text-sm font-semibold text-heading mb-1.5">Hotel</label>
            <select name="hotel_id" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                <option value="">Wybierz hotel</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}" @selected(old('hotel_id', $room->hotel_id) == $hotel->id)>{{ $hotel->name }}</option>
                @endforeach
            </select>
        </div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Numer pokoju</label><input type="text" name="room_number" value="{{ old('room_number', $room->room_number) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Pojemność</label><input type="number" name="capacity" value="{{ old('capacity', $room->capacity) }}" min="1" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Cena za noc (zł)</label><input type="text" name="price" value="{{ old('price', $room->price_per_night) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Opis</label><input type="text" name="description" value="{{ old('description', $room->description) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Zapisz</button>
    </form>
@endsection
