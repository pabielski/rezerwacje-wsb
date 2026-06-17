@extends('main')
@section('content')
    <div class="bg-surface border border-border rounded-2xl shadow-sm p-8 md:p-10">
        <h1 class="text-3xl font-bold text-heading">System rezerwacji hotelowych</h1>
        <p class="text-muted mt-3 max-w-xl">Zarządzaj hotelami, pokojami i rezerwacjami online — panel admina lub rezerwacja jako klient.</p>

        <div class="mt-8 pt-6 border-t border-border">
            @auth
                @if(auth()->user()->role == 'admin')
                    <p class="text-sm font-semibold text-heading mb-4">Panel administratora</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="/hotels" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Hotele</a>
                        <a href="/rooms" class="bg-page hover:bg-border text-heading px-5 py-2.5 rounded-lg text-sm font-semibold border border-border">Pokoje</a>
                        <a href="/amenities" class="bg-page hover:bg-border text-heading px-5 py-2.5 rounded-lg text-sm font-semibold border border-border">Udogodnienia</a>
                        <a href="/reservations" class="bg-page hover:bg-border text-heading px-5 py-2.5 rounded-lg text-sm font-semibold border border-border">Rezerwacje</a>
                    </div>
                @else
                    <p class="text-sm font-semibold text-heading mb-4">Zarezerwuj pobyt</p>
                    <a href="/my-reservations/create" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Nowa rezerwacja</a>
                @endif
            @else
                <p class="text-muted text-sm mb-4">Zaloguj się lub załóż konto, aby korzystać z systemu.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="/login" class="bg-page hover:bg-border text-heading px-5 py-2.5 rounded-lg text-sm font-semibold border border-border">Zaloguj</a>
                    <a href="/register" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Rejestracja</a>
                </div>
            @endauth
        </div>
    </div>
@endsection
