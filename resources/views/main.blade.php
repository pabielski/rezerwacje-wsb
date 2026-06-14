<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Internal Events - All
    </title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link

        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+
Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 flex flex-wrap items-center justify-between gap-4 mb-4">
                <h1 class="text-2xl font-bold text-zinc-800 m-0">Rezerwacje hotelowe</h1>

                <div class="flex items-center gap-3 text-sm">
                    @auth
                        <span class="text-zinc-600">
                            Witaj, <strong class="text-zinc-800">{{ auth()->user()->name }}</strong>
                        </span>
                        <form action="/logout" method="post" class="inline">
                            @csrf
                            <button
                                type="submit"
                                class="text-red-500 hover:text-red-600 font-medium"
                            >
                                Wyloguj
                            </button>
                        </form>
                    @else
                        <a href="/login" class="text-blue-500 hover:text-blue-600 font-medium">Zaloguj</a>
                        <a href="/register" class="text-blue-500 hover:text-blue-600 font-medium">Rejestracja</a>
                    @endauth
                </div>
            </div>
            <nav class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
                @yield('menu')
            </nav>
        </div>
    </div>
    <hr>
   @yield('content')

   @vite(['resources/css/app.css', 'resources/js/app.js'])

</body>

</html>