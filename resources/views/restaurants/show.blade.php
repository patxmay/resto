@extends('layouts.app')

@section('content')
<h1>{{ $restaurant->name }}</h1>
<p>Adresse : {{ $restaurant->address }}</p>
<p>Type de cuisine : {{ $restaurant->cuisine }}</p>
<p>Note : {{ $restaurant->rating }}</p>
@endsection