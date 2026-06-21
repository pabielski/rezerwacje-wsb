@extends('main')
@section('content')
    <div class="mb-6">
        <a href="/reviews" class="text-sm text-muted hover:text-brand font-medium">← Lista opinii</a>
        <h1 class="text-2xl font-bold text-heading mt-2">{{ $title }}</h1>
    </div>
    @if ($errors->any())<ul class="list-none text-danger text-sm rounded-xl px-4 py-3 mb-4">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
    <form action="/reviews/add-to-database" method="post" class="bg-surface border border-border rounded-2xl shadow-sm p-6 max-w-xl space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-heading mb-1.5">Rezerwacja</label>
            <select name="reservation_id" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                <option value="">— wybierz rezerwację —</option>
                @foreach ($reservations as $reservation)
                    <option value="{{ $reservation->id }}" @selected(old('reservation_id') == $reservation->id)>
                        #{{ $reservation->id }} · {{ $reservation->date_from }} – {{ $reservation->date_to }}
                    </option>
                @endforeach
            </select>
        </div>
<div>
            <label class="block text-sm font-semibold text-heading mb-1.5">Ocena (1–5)</label>
            <select name="rating" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Treść opinii</label><textarea name="content" rows="4" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">{{ old('content') }}</textarea></div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Dodaj opinię</button>
    </form>
@endsection
