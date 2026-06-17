@extends('main')
@section('content')
    <div class="mb-6">
        <a href="/rooms" class="text-sm text-muted hover:text-brand font-medium">← Lista pokoi</a>
        <h1 class="text-2xl font-bold text-heading mt-2">Dodaj udogodnienie do pokoju</h1>
    </div>
    <form method="post" class="bg-surface border border-border rounded-2xl shadow-sm p-6 max-w-xl space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-heading mb-1.5">Udogodnienie</label>
            <select name="amenity_id" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                @foreach($amenities as $amenity)
                    <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Dodaj</button>
    </form>
@endsection
