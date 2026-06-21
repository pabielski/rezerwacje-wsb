@extends('main')
@section('content')
@if(session('status'))
    <div class="alert alert-success" >
      <p class="text-success text-sm rounded-xl px-4 py-3 mb-4">{{ session('status') }}</p> 
    </div>
@endif
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-heading">{{ $title }}</h1>
            <p class="text-sm text-muted mt-1">Wszystkie opinie w systemie</p>
        </div>
        <a href="/reviews/create" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold shrink-0">+ Dodaj opinię</a>
    </div>

    <form action="/reviews" method="get" class="bg-surface border border-border rounded-2xl shadow-sm p-5 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Szukaj</label><input type="text" name="search" value="{{ request('search') }}" placeholder="ID użytkownika, rezerwacji..." class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        </div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Szukaj</button>
        <a href="/reviews" class="text-muted hover:text-heading text-sm font-medium ml-3">Wyczyść filtry</a>
    </form>

    <div class="bg-surface border border-border rounded-2xl shadow-sm overflow-hidden">
        @forelse ($reviews as $review)
            <div class="p-5 border-b border-border last:border-b-0 hover:bg-page/50 transition-colors">
                <div class="flex flex-wrap justify-between gap-2">
                    <h2 class="text-lg font-bold text-heading">#{{ $review->id }} · Rezerwacja #{{ $review->reservation_id }}</h2>
                    <span class="px-2.5 py-0.5 rounded-md text-xs font-semibold bg-page text-muted">{{ $review->rating }}/5</span>
                </div>
                <p class="text-muted text-sm mt-1">{{ $review->user->name }} ({{ $review->user->email }}) · {{ $review->created_at }}</p>
                <p class="text-heading text-sm mt-2">{{ Str::limit($review->content, 120) }}</p>
                <div class="mt-3 flex gap-4 text-sm">
                @if($review->user_id === auth()->id())
                <a href="/reviews/edit/{{ $review->id }}" class="text-brand font-semibold hover:text-brand-dark">Edytuj</a>
                @endif
                    <form action="/reviews/delete/{{ $review->id }}" method="post" class="inline">@csrf @method('DELETE')<button type="submit" class="text-danger font-semibold hover:opacity-80">Usuń</button></form>
                </div>
            </div>
        @empty
            <p class="p-8 text-center text-muted">Brak opinii.</p>
        @endforelse
    </div>
@endsection
