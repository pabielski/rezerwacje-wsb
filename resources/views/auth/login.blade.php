@extends('main')

@section('content')
    <h1>{{ $title }}</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/login" method="post">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
        <input type="password" name="password" placeholder="Hasło">
        <button type="submit">Zaloguj się</button>
    </form>

    <p>Nie masz konta? <a href="/register" class="text-blue-500">Zarejestruj się</a></p>
@endsection
