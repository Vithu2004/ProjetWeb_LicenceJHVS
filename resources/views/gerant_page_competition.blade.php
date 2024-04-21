@extends('template')

@section('title')
    Gerant :
@endsection

@section('content')
    @auth

    <div class="gerant">
        <h2>Créer un sport</h2>
        <form action="{{route('createSport')}}" method="post" class="jo-form createSportForm">
            @csrf
            Nom du sport :
            <input type="text" name="name" class="jo-form-input">
            <br>
            <input type="submit" value="Créer" class="jo_form_submit">
        </form>
        <br>

        <h2>Créer un lieu</h2>
        <form action="{{route('createLieu')}}" method="post" class="jo-form createLieuForm">
            @csrf
            Nom du lieu :
            <input type="text" name="name" class="jo_form-input">
            Capacité :
            <input type="number" name="capacite" class="jo_form-input">
            <input type="submit" value="Créer" class="jo_form_submit">
        </form>
        <br>

        <h2>Créer une competition</h2>
        <form action="{{route('createCompetition')}}" method="post" class="jo-form createCompetitionForm">
            @csrf
            Nom :
            <input type="text" name="nom" class="jo_form-input">
            <br>
            Sport :
            <input list="sport" name="sport" class="jo_form-input"> 
            <datalist id="sport">
                @foreach($sport as $row)
                    <option value="{{$row->nom}}"></option>
                @endforeach
            </datalist>
            <br>
            Lieu :
            <input list="lieu" name="lieu" class="jo_form-input">
            <datalist id="lieu">
                @foreach($lieu as $row)
                    <option value="{{$row->nom}}"></option>
                @endforeach
            </datalist>
            <br>
            Date :
            <input type="date" name="date" class="jo_form-input">
            <br>
            Heure de Début :
            <input type="number" name="heure_debut" class="jo_form-input">
            <br>
            Heure de Fin :
            <input type="number" name="heure_fin" class="jo_form-input">
            <br>
            Prix du Billet :
            <input type="text" name="prix_du_billet" class="jo_form-input">
            <br>
            <input type="submit" value="Créer" class="jo_form_submit">
        </form>
        <br>
        
        <h2>Modifier une compétition</h2>
        <form action="{{route('modificateCompetition')}}" method="post" class="jo-form modificateCompetition">
            @csrf
            Nom de la compétition :
            <input list="nom" name="nom" class="jo_form-input">
                <datalist id="nom">
                    @foreach($competition as $row)
                        <option value="{{$row->nom}}"></option>
                    @endforeach
                </datalist>
            <br>
            Nouveau sport :
            <input list="sport" name="sport" class="jo_form-input"> 
                <datalist id="sport">
                    @foreach($sport as $row)
                        <option value="{{$row->nom}}"></option>
                    @endforeach
                </datalist>
            <br>
            Nouveau lieu :
            <input list="lieu" name="lieu" class="jo_form-input">
                <datalist id="lieu">
                    @foreach($lieu as $row)
                        <option value="{{$row->nom}}"></option>
                    @endforeach
                </datalist>
            <br>
            Nouveau nom : 
            <input type="text" name="new_nom" class="jo-form-input">
            <br>
            Nouvelle date :
            <input type="date" name="date" class="jo-form-input">
            <br>
            Nouvelle heure de début :
            <input type="number" name="heure_debut" class="jo-form-input">
            <br>
            Nouvelle heure de fin :
            <input type="number" name="heure_fin" class="jo-form-input">
            <br>
            Nouveau prix du billet :
            <input type="text" name="prix_du_billet" class="jo-form-input">
            <br>
            <input type="submit" value="Modifier" class="jo-form-submit">
        </form>
        <br>

        <h2>Supprimer une compétition</h2>
        <form action="{{route('deleteCompetition')}}" method="post" class="jo-form deleteCompetition">
            @csrf 
            Nom de la compétition :
            <input list="nom" name="nom" class="jo_form-input">
                <datalist id="nom">
                    @foreach($competition as $row)
                        <option value="{{$row->nom}}"></option>
                    @endforeach
                </datalist>
            <br>
            <input type="submit" value="Supprimer" class="jo-form-submit">
        </form>

        <h2>Les réservation :</h2>
        <table>
            <tr><td>Nom</td><td>Prenom</td><td>Competition</td><td>Email</td><td>Numéro de téléphone</td></tr>
            @foreach($personne as $row)
                <tr>
                    <td>{{$row->nom}}</td>
                    <td>{{$row->prenom}}</td>
                    <td>{{$row->reservation->competition->nom}}</td>
                    <td>{{$row->reservation->email}}</td>
                    <td>{{$row->reservation->numero_telephone}}</td>
                </tr>
            @endforeach
        </table>

        <h2>Nombre de spectateur : </h2>
        <table>
            <tr><td>Nom de la compétition</td><td>Nombre de spectateur</td></tr>
            @foreach($spectateurCompetition as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>

        <h2>Place restante</h2>
        <table>
            <tr><td>Nom de la compétition</td><td>Place restante</td></tr>
            @foreach($placeCompetition as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <form action="{{route('auth.logout')}}" method="post">
        @method("delete")
        @csrf
        <input type="submit" value="Se déconnecter">
    </form>

    @endauth
@endsection