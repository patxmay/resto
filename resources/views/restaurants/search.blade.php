@extends('layouts.app')

@section('content')
<h1>Recherche de Restaurants</h1>
<form method="GET" action="{{ route('restaurants.search') }}">
    <input type="text" name="name" placeholder="Nom du restaurant">
    <input type="text" name="address" placeholder="Adresse">
    <select name="cuisine">
        <option value="">Type de cuisine</option>
        <option value="italian">Italien</option>
        <option value="chinese">Chinois</option>
        <option value="french">Français</option>
    </select>
    <button type="submit">Rechercher</button>
</form>
<ul>
    @foreach($restaurants as $restaurant)
        <li>
            <a href="{{ route('restaurants.show', $restaurant->id) }}">{{ $restaurant->name }}</a> - {{ $restaurant->address }}
        </li>
    @endforeach
</ul>
@endsection