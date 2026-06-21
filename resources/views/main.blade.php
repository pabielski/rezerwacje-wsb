<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rezerwacje hotelowe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-page text-heading min-h-screen font-sans antialiased">
    <div class="flex min-h-screen">

        @auth
            <aside class="w-64 shrink-0 bg-surface border-r border-border flex flex-col fixed inset-y-0 left-0 z-20">
                <div class="px-5 py-6 border-b border-border">
                    <a href="/" class="text-lg font-bold text-heading tracking-tight block">Rezerwacje</a>
                    <span class="text-xs text-muted">hotelowe</span>
                </div>

                <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto text-sm">
                    <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-muted">Nawigacja</p>

                    <a href="/"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('/') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                        Strona główna
                    </a>

                    @if(auth()->user()->role == 'admin')
                        <a href="/hotels"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('hotels*') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Hotele
                        </a>
                        <a href="/rooms"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('rooms*') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Pokoje
                        </a>
                        <a href="/amenities"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('amenities*') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Udogodnienia
                        </a>
                        <a href="/reservations"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('reservations*') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Rezerwacje
                        </a>
                        <a href="/reviews"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('reviews*') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Opinie
                        </a>
                    @else
                        <a href="/my-reservations"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('my-reservations') && !request()->is('my-reservations/create') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Moje rezerwacje
                        </a>
                        <a href="/my-reservations/create"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('my-reservations/create') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Nowa rezerwacja
                        </a>
                        <a href="/my-reviews"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('my-reviews') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Moje opinie
                        </a>
                        <a href="/reviews/create"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium {{ request()->is('reviews/create') ? 'bg-brand-light/60 text-brand-dark font-semibold' : 'text-muted hover:bg-page hover:text-heading' }}">
                            Dodaj opinię
                        </a>
                    @endif
                </nav>

                <div class="px-4 py-4 border-t border-border">
                    <p class="text-sm font-semibold text-heading truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-muted mb-3">{{ auth()->user()->role == 'admin' ? 'Administrator' : 'Klient' }}</p>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="w-full text-left text-sm text-danger hover:opacity-80 font-medium">Wyloguj</button>
                    </form>
                </div>
            </aside>
        @endauth

        <div class="flex-1 min-h-screen @auth ml-64 @endauth">
            @if(request()->is('login', 'register'))
                <main class="min-h-screen flex items-center justify-center px-6 py-8">
                    @yield('content')
                </main>
            @else
                <main class="px-6 py-8 @auth max-w-5xl @else max-w-3xl mx-auto w-full @endauth">
                    @yield('content')
                </main>
            @endif
        </div>
    </div>
</body>
</html>
