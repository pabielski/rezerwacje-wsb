@extends('main')

@section('content')
    <h1>Dodaj udogodnienie do pokoju</h1>

    <form method="post">
        @csrf

        <select name="amenity_id">
            @foreach($amenities as $amenity)
                <option value="{{ $amenity->id }}">
                    {{ $amenity->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Dodaj</button>
    </form>
@endsection