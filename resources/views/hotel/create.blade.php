@extends('app.layout')

@section('content')
<div class="container">
    <h2>Ajouter un hôtel</h2>
    <form action="{{ route('hotel.store') }}" method="post">
        @csrf
        <div class="wrap">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}">
        </div>
        <div class="wrap">
            <label for="lieu">Lieu</label>
            <input type="text" name="lieu" id="lieu" value="{{ old('lieu') }}">
        </div>
        <div class="wrap">
            <label for="quand">Date</label>
            <input type="date" name="quand" id="quand" value="{{ old('quand') }}">
        </div>
        <div class="wrap">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ old('decsription') }}</textarea>
        </div>
        <div class="wrap">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="wrap">
            <label for="etiquettes[]">Étiquette</label>
            <select name="etiquettes[]" id="etiquettes" multiple>
                @foreach ($etiquettes as $etiquette)
                    <option value="{{ $etiquette->id }}">{{ $etiquette->nom }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Valider">
    </form>
    <a class="btn-retour" href="{{ route('hotel.index') }}">Retour</a>
</div>
@endsection