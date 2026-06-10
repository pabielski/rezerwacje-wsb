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
            <div class="col-sm-12">
                <h1>Laravel page</h1>
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