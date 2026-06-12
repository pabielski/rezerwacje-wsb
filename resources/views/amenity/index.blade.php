@extends('main')
@section('menu')
    <a href="/amenities/create" class="text-blue-500">Create</a>
    <a href="/amenities" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    @foreach ($amenities as $amenity)
    <div class="bg-zinc-100 border border-zinc-200 rounded-lg shadow-md p-4 mb-4">
        <h1 class="text-xl font-bold">{{ $amenity->name }}</h1>
        <p class="text-zinc-600 text-sm">{{ $amenity->description }}</p>
        <div>
        <a href="{{ url()->current() }}/{{ $amenity->id }}" class="text-green-500">View</a>
        <a href="{{ url()->current() }}/edit/{{ $amenity->id }}" class="text-blue-500">Edit</a>
        <form action="/amenities/delete/{{ $amenity->id }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500">Delete</button>
</form>
    </div>
    </div>
   
    @endforeach
@endsection
