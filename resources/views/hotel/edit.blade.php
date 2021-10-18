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
            <textarea name="description" id="description" cols="30" rows="10">{{ $hotel->description, old('description') }}</textarea>
        </div>
        <div class="wrap">
            <label for="categorie_id">Categorie</label>
            <select name="categorie_id" id="categorie_id">
                @foreach ($categories as $categorie)
                    @if($hotel->categorie_id == $categorie->id)
                        <option value="{{ $categorie->id }}" selected>{{ $categorie->nom }}</option>
                    @else
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="wrap">
            <label for="etiquettes[]">Étiquette</label>
            <select name="etiquettes[]" id="etiquettes" multiple>
                @foreach ($etiquettes as $etiquette)
                    <option value="{{ $etiquette->id }}" {{ in_array($etiquette->id, old('etiquette') ?: $hotel->etiquettes->pluck('id')->all()) ? 'selected' : "" }}>{{ $etiquette->nom }}</option>
                @endforeach
            </select>
            @error('etiquettes[]')
                <div class="error">{{ message }}</div>
            @enderror
        </div>
        <input type="submit" value="Valider">
    </form>
    <a class="btn-retour" href="{{ route('hotel.index') }}">Retour</a>
</div>
@endsection