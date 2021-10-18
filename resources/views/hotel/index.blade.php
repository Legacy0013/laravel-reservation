@extends('app.layout')

@section('content')
<div class="container index">
    @if(session('success-supp'))
        <div class="success">
            {{ session('success-supp') }}
        </div>
    @endif

    @if(session('success-add'))
        <div class="success">
            {{ session('success-add') }}
        </div>
    @endif
    @if(session('success-modif'))
        <div class="success">
            {{ session('success-modif') }}
        </div>
    @endif
    <a class="btn-retour" href="{{ route('hotel.create') }}">Ajouter un hôtel</a>
    <h2>Liste des hôtels</h2>
    {{-- <form action="hotel.index" method="post">
        <select class="nbrLigne" name="nbrLigne" id="nbrLigne">
            <option value="10" selected>10</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input type="submit" value="Valider">
    </form> --}}
   
    <table class="list-hotels">
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>DESCRIPTION</th>
            <th>CATEGORIE</th>
            <th colspan="3">ACTIONS</th>
        </tr>

        @foreach ($hotels as $key => $hotel) 
        <tr>
            @if($hotel->id < 10)
                <td>0{{ $hotel->id }}</td>
                <td> {{ $hotel->nom }}</td>
                <td>{{ $hotel->description }}</td>
                <td>{{ $hotel->categorie->nom }}</td> 
                <td><a class="btn-retour" href="{{ route('hotel.show',$hotel->id) }}">Voir</a></td>
                <td><a class="btn-retour" href="{{ route('hotel.edit',$hotel->id) }}">Modifier</a></td>               
                <td>
                    <form class="delete" action="{{ route('hotel.destroy',$hotel->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input class="delete" type="submit" value="Supprimer">
                    </form>
                </td>
            @else
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->nom }}</td>
                <td>{{ $hotel->description }}</td>
                <td>{{ $hotel->categorie->nom }}</td> 
                <td><a class="btn-retour" href="{{ route('hotel.show',$hotel->id) }}">Voir</a></td>
                <td><a class="btn-retour" href="{{ route('hotel.edit',$hotel->id) }}">Modifier</a></td>                
                <td>
                    <form class="delete" action="{{ route('hotel.destroy',$hotel->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input class="delete" type="submit" value="Supprimer">
                    </form>
                </td>
            @endif
        </tr>
        @endforeach
    </table>
    {{ $hotels->links() }}
</div>
@endsection