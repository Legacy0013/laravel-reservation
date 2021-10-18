@extends('app.layout')

@section('content')
<div class="container">
    <h2>Détails de l'hôtel</h2>
    <ul>
        <li>ID : {{ $hotel->id }}</li>
        <li>Nom : {{ $hotel->nom }}</li>
        <li>Lieu : {{ $hotel->lieu }}</li>
        <li>Date : {{ $hotel->quand }}</li>
        <li>Description : {{ $hotel->description }}</li>
        @if( $hotel->affiche != null)
        <li>Affiche : {{ $hotel->affiche }}</li>
        @endif
        <li>Catégorie : {{ $hotel->categorie->nom }}</li>
        <li> 
            @if($hotel->etiquettes->count() > 1)
                Étiquette(s) : 
            @else
                Étiquette : 
            @endif
            @foreach ($hotel->etiquettes as $etiquette)
                {{ $etiquette->nom }} 
                @if (!$loop->last)
                    /
                @endif
            @endforeach
        </li>
    </ul>
    <a class="btn-retour" href="{{ route('hotel.index') }}">Retour</a>
</div>
@endsection