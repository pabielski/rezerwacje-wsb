@extends('main')
@section('menu')
    <a href="/hotels/create" class="text-blue-500">Create</a>
    <a href="/hotels" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>Hotel</h1>
    @foreach ($hotels as $hotel)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $hotel->name }}</h1>
        <p class="text-zinc-600 text-sm">{{ $hotel->description }}</p>
        <div>
        <a href="{{ url()->current() }}/{{ $hotel->id }}" class="text-green-500">View</a>
        <a href="{{ url()->current() }}/edit/{{ $hotel->id }}" class="text-blue-500">Edit</a>
        <a href="{{ url()->current() }}/delete/{{ $hotel->id }}" class="text-red-500">Delete</a>
    </div>
    </div>
   
    @endforeach
@endsection
