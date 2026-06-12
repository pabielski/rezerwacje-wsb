@extends('main')
@section('menu')
    <a href="/amenities/create" class="text-blue-500">Create</a>
    <a href="/amenities" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    <form action="/amenities/update/{{ $amenity->id }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $amenity->name }}">
        <input type="text" name="description" value="{{ $amenity->description }}">
        <button type="submit">Save</button>
    </form>
@endsection