@extends('main')
@section('menu')
    <a href="/hotels/create" class="text-blue-500">Create</a>
    <a href="/hotels" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    <form action="/amenities/add-to-database" method="post">
        @csrf
        <input type="text" name="name" value="{{ $amenity->name }}">
        <input type="text" name="description" value="{{ $amenity->description }}">
        <button type="submit">Create</button>
    </form>
@endsection