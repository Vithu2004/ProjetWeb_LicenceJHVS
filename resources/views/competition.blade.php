@extends('template')

@section('title')
    Voir les compétitions
@endsection

@section('content')
    <div class="competition">
        <h2>Filtre :</h2>
        <form action="{{route('competitionWithFilter')}}" method="post" class="jo-form">
            @csrf
            Sport : 
            <input list="sport" name="sport" class="jo-form-input"> 
                <datalist id="sport">
                    @foreach($sport as $row)
                        <option value="{{$row->nom}}"></option>
                    @endforeach
                </datalist>
            Date :
            <input type="date" name="date" class="jo-form-input">
            Maximum :
            <div>
                25 <input type="range" name="maximum"  min="25" max="500" value="500"> 500
            </div>
            <input type="submit" value="Filtrer">
        </form>
        <br>
        <h2>Competition :</h2>
        <div class="table-responsive">
            <table>
                <tr><td>Sport</td><td>Lieu</td><td>Competition</td><td>date</td><td>Heure de début</td><td>Heure de fin</td><td>Prix</td></tr>
                @foreach($competition as $row)
                    <tr>
                        <td>{{$row->sport->nom}}</td>
                        <td>{{$row->lieu->nom}}</td>
                        <td>{{$row->nom}}</td>
                        <td>{{$row->date}}</td>
                        <td>{{$row->heure_de_debut}}</td>
                        <td>{{$row->heure_de_fin}}</td>
                        <td>{{$row->prix_du_billet}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection