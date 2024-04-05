@extends ('template')

@section('title')
    Achat Complet
@endsection

@section ('content')
    <p>Vos réservation :</p>
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

    <p>Personnes :</p>
    <table>
        <tr><td>Nom</td><td>Prenom</td></tr>
    @foreach($personnes as $row)
    <tr>
        <td>{{$row->nom}}</td>
        <td>{{$row->prenom}}</td>    
    </tr>
    @endforeach
    </table>
    <p>Le prix est de  : {{$prix}}</p>
@endsection