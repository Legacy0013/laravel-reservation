@extends('app.layout')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Modifier un hôtel</h2>
    <form action="{{ route('hotel.update', $hotel) }}" method="post">
        @csrf
        @method('put')
        <div class="wrap">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $hotel->nom, old('nom') }}">
        </div>
        <div class="wrap">
            <label for="lieu">Lieu</label>
            <input type="text" name="lieu" id="lieu" value="{{ $hotel->lieu, old('lieu') }}">
        </div>
        <div class="wrap">
            <label for="quand">Date</label>
            <input type="date" name="quand" id="quand" value="{{ $hotel->quand, old('quand') }}">
        </div>
        <div class="wrap">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $hotel->description, old('decsription') }}</textarea>
        </div>
        <input type="submit" value="Valider">
    </form>
    <a class="btn-retour" href="{{ route('hotel.index') }}">Retour</a>
</div>
@endsection