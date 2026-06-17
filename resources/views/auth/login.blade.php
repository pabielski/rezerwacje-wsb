@extends('main')
@section('content')
    <div class="w-full max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-heading">{{ $title }}</h1>
            <p class="text-sm text-muted mt-2">Zaloguj się do systemu rezerwacji</p>
        </div>
        @if (session('status'))<p class=" text-success text-sm rounded-xl px-4 py-3 mb-4">{{ session('status') }}</p>@endif
        @if ($errors->any())<ul class=" list-none text-danger text-sm rounded-xl px-4 py-3 mb-4 ">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
        <form action="/login" method="post" class="bg-surface border border-border rounded-2xl shadow-sm p-6 space-y-4">
            @csrf
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Email</label><input type="email" name="email" value="{{ old('email') }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
            <div><label class="block text-sm font-semibold text-heading mb-1.5">Hasło</label><input type="password" name="password" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
            <button type="submit" class="w-full bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Zaloguj się</button>
        </form>
        <p class="mt-6 text-center text-sm text-muted">Nie masz konta? <a href="/register" class="text-brand font-semibold hover:text-brand-dark">Zarejestruj się</a></p>
    </div>
@endsection
