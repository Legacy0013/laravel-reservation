@extends('app.layout')

@section('content')
<div class="container">
    <h1>Réservation en ligne</h1>
    <form action="{{ route('form-contact') }}" method="post" id="formulaire">
        @csrf
        <div class="wrap nom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}">
            @error('nom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="wrap prenom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}">
            @error('prenom')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="wrap dates">
            <label for="daterange">Dates</label>
            <input type="text" name="datefilter" id="datefilter" value="{{ old('datefilter') }}" readonly />  
            @error('datefilter')
                <div class="error">{{ $message }}</div>
            @enderror
            <div class="arrivee">
                <div class="text">Arrivée</div>
            </div>    
            <div class="depart">
                <div class="text">Départ</div>
            </div>
        </div>
        <div class="wrap hotel">
            <label for="hotel">Hôtel</label>
            <select name="hotel" id="hotel">
                @foreach ($hotels as $hotel)
                    <option value="{{ $loop->index }}" @if (old('hotel') == $loop->index) selected @endif >{{ $hotel }}</option>
                @endforeach
            </select>
            @error('hotel')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="wrap adultes">
            <label for="adultes">Nombre d'adultes</label>
            <select name="adultes" id="adultes" value="{{ old('adultes') }}">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <div class="wrap enfants">
            <label for="enfants">Nombre d'enfants</label>
            <select name="enfants" id="enfants" value="{{ old('enfants') }}">
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="wrap">
            <label for="demo2">Petits déjeuners</label>
            <div class="wrap radio">
                <input type="radio" name="demo2" class="demo2 demoyes" id="demo2-a" value="oui" checked>
                <label for="demo2-a">Oui</label>
                <input type="radio" name="demo2" class="demo2 demono" id="demo2-b" value="non" >
                <label for="demo2-b">Non</label>
            </div>
        </div>
        
        <div class="wrap time">
            <label for="time">Heure d'arrivée prévue</label>
            <input type="time" id="time" name="time" min="09:00" max="21:00" value="{{ old('time') }}">
            @error('time')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="wrap commentaire">
            <label for="message">Commentaire</label>
            <textarea name="message" id="message" cols="30" rows="10">{{ old('message') }}</textarea>
        </div>
        <input type="hidden" name="arrivee" id="arrivee" value="{{ old('arrivee') }}">
        <input type="hidden" name="depart" id="depart" value="{{ old('depart') }}">
        <input type="submit" value="Demande de réservation">
    </form>
</div>
@endsection