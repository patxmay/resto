@extends('layouts.app')

@section('content')
<h1>Modération des Critiques</h1>
<ul>
    @foreach($reviews as $review)
        <li>
            <p>{{ $review->content }}</p>
            <form method="POST" action="{{ route('reviews.validate', $review->id) }}">
                @csrf
                <button type="submit">Valider</button>
            </form>
            <form method="POST" action="{{ route('reviews.invalidate', $review->id) }}">
                @csrf
                <button type="submit">Invalider</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection