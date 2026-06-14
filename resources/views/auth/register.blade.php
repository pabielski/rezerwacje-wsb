@extends('main')

@section('content')
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Imię i nazwisko">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
        <input type="password" name="password" placeholder="Hasło">
        <input type="password" name="password_confirmation" placeholder="Powtórz hasło">
        <button type="submit">Utwórz konto</button>
    </form>

    <p>Masz już konto? <a href="/login" class="text-blue-500">Zaloguj się</a></p>
@endsection
