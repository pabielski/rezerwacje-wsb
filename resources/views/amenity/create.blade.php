@extends('main')
@section('content')
    <div class="mb-6">
        <a href="/amenities" class="text-sm text-muted hover:text-brand font-medium">Lista udogodnień</a>
        <h1 class="text-2xl font-bold text-heading mt-2">{{ $title }}</h1>
    </div>
    @if ($errors->any())<ul class=" list-none text-danger text-sm rounded-xl px-4 py-3 mb-4 ">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
    <form action="/amenities/add-to-database" method="post" class="bg-surface border border-border rounded-2xl shadow-sm p-6 max-w-xl space-y-4">
        @csrf
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Nazwa</label><input type="text" name="name" value="{{ old('name', $amenity->name) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <div><label class="block text-sm font-semibold text-heading mb-1.5">Opis</label><input type="text" name="description" value="{{ old('description', $amenity->description) }}" class="w-full border border-border rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></div>
        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-semibold">Zapisz</button>
    </form>
@endsection
