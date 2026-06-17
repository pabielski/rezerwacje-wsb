@extends('main')
@section('content')
    <div class="mb-6">
        <a href="/reservations" class="text-sm text-muted hover:text-brand font-medium">← Lista rezerwacji</a>
        <h1 class="text-2xl font-bold text-heading mt-2">{{ $title }}</h1>
    </div>
    @if ($errors->any())<ul class=" list-none text-danger text-sm rounded-xl px-4 py-3 mb-4 ">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
    <form action="/reservations/update/{{ $reservation->id }}" method="post" class="bg-surface border border-border rounded-2xl shadow-sm p-6 max-w-xl space-y-4">
        @csrf
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Imię gościa</label><input type="text" name="guest_first_name" value="{{ old('guest_first_name', $reservation->guest_first_name) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Nazwisko gościa</label><input type="text" name="guest_last_name" value="{{ old('guest_last_name', $reservation->guest_last_name) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Email</label><input type="email" name="guest_email" value="{{ old('guest_email', $reservation->guest_email) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Telefon</label><input type="text" name="guest_phone" value="{{ old('guest_phone', $reservation->guest_phone) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Data od</label><input type="date" name="date_from" value="{{ old('date_from', $reservation->date_from) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Data do</label><input type="date" name="date_to" value="{{ old('date_to', $reservation->date_to) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">ID pokoju</label><input type="text" name="room_id" value="{{ old('room_id', $reservation->room_id) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">ID użytkownika</label><input type="text" name="user_id" value="{{ old('user_id', $reservation->user_id) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Cena (zł)</label><input type="text" name="total_price" value="{{ old('total_price', $reservation->total_price) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Status</label><input type="text" name="status" value="{{ old('status', $reservation->status) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Zapisz</button>
    </form>
@endsection
