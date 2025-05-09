@extends('layouts.app')

@section('content')
<h1>Mon Profil</h1>
<form method="POST" action="{{ route('users.updateProfile') }}">
    @csrf
    <input type="text" name="address" value="{{ $user->address }}" placeholder="Adresse">
    <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Téléphone">
    <label>
        <input type="checkbox" name="allow_contact" {{ $user->allow_contact ? 'checked' : '' }}> Être contacté par des restaurants
    </label>
    <button type="submit">Mettre à jour</button>
</form>
<h2>Restaurants aimés</h2>
@foreach($user->likedRestaurants as $restaurant)
    <div>
        <h3>{{ $restaurant->name }}</h3>
        <p>{{ $restaurant->address }}</p>
    </div>
@endforeach
@endsection