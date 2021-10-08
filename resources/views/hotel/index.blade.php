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
    <table class="list-hotels">
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>DESCRIPTION</th>
            <th colspan="3">ACTIONS</th>
        </tr>

        @foreach ($hotels as $key => $hotel) 
        <tr>
            @if($hotel->id < 10)
                <td>0{{ $hotel->id }}</td>
                <td> {{ $hotel->nom }}</td>
                <td>{{ $hotel->description }}</td>
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