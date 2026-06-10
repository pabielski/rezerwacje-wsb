@extends('main')
@section('menu')
    <a href="/hotels/create" class="text-blue-500">Create</a>
    <a href="/hotels" class="text-blue-500">List</a>
@endsection
@section('content')
    <h1>Create Hotel</h1>
    <form action="/hotels/add-to-database" method="post">
        @csrf
        <input type="text" name="name" value="{{ $model->name }}">
        <input type="text" name="description" value="{{ $model->description }}">
        <input type="text" name="city" value="{{ $model->city }}">
        <input type="text" name="address" value="{{ $model->address }}">
        <button type="submit">Create</button>
    </form>
@endsection