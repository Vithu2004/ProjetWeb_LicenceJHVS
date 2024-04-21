@extends ('template')

@section('title')
    Achat Complet
@endsection

@section ('content')
    <div class="achat">
        <h2>Vos réservation :</h2>
        <table>
            <tr><td>Competition</td><td>Numéro de téléphone</td><td>Email</td></tr>
            @foreach($reservations as $row)
            <tr>
                <td>{{$row->competition->nom}}</td>
                <td>{{$row->numero_telephone}}</td>
                <td>{{$row->email}}</td>
            </tr>
            @endforeach
        </table>
        <br>
        <h2>Personnes :</h2>
        <table>
            <tr><td>Nom</td><td>Prenom</td></tr>
        @foreach($personnes as $row)
        <tr>
            <td>{{$row->nom}}</td>
            <td>{{$row->prenom}}</td>    
        </tr>
        @endforeach
        </table>
        <br>
        <p>Le prix est de  : {{$prix}} euro</p>
    </div>
@endsection