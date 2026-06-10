@extends('main')
@section('menu')
    <a href="/hotels/create" class="text-blue-500">Create</a>
    <a href="/hotels" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>Edit Hotel</h1>
    <form action="/hotels/update/{{ $model->id }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $model->name }}">
        <input type="text" name="description" value="{{ $model->description }}">
        <button type="submit">Save</button>
    </form>
@endsection