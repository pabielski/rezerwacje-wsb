@extends('main')
@section('menu')
    <a href="/reservations/create" class="text-blue-500">Create</a>
    <a href="/reservations" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    @foreach ($reservations as $reservation)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $reservation->id }}</h1>
        <p class="text-zinc-600 text-sm">{{ $reservation->date_from }}</p>
        <p class="text-zinc-600 text-sm">{{ $reservation->date_to }}</p>
        <div>
        <a href="{{ url()->current() }}/{{ $reservation->id }}" class="text-green-500">View</a>
        <a href="{{ url()->current() }}/edit/{{ $reservation->id }}" class="text-blue-500">Edit</a>
        <a href="{{ url()->current() }}/delete/{{ $reservation->id }}" class="text-red-500">Delete</a>
    </div>
    </div>
   
    @endforeach
@endsection
