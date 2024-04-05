@extends('template')

@section('title')
    Billeterie
@endsection

@section('content')
    <form action="{{route('acheter_billet')}}" method="post">
        @csrf
        Telephone : 
        <input type="text" name="Telephone" class="jo_form-input">
        Email :
        <input type="text" name="Email" class="jo_form-input">
        Nombre de Competition : 
        <input type="text" name="nCompetition" class="jo_form-input"> 
        Nombre de Personne :
        <input type="text" name="nPersonne" class="jo_form-input">
        
        <input type="submit" value="Envoyez" class="jo_form_submit">
    </form>

    <br>

    @if($isCompetition == true)
    <form action="{{route('acheter_billet_competition')}}" method="post">
        @csrf
        <input type="hidden" name="Telephone" value="{{$numero}}">
        <input type="hidden" name="Email" value="{{$email}}">
        <input type="hidden" name="nCompetition" value="{{$nCompetition}}">
        <input type="hidden" name="nPersonne" value="{{$nPersonne}}">
        @for ($i = 1; $i <= $nCompetition; $i++)
        Competition n°{{$i}} : 
        <input list="competition" name="Competition_{{$i}}" class="jo_form-input"> 
        <datalist id="competition">
            @foreach($tab as $row)
                <option value="{{$row->nom}}"></option>
            @endforeach
        </datalist>            
        @endfor   
        <input type="submit" value="Envoyez" class="jo_form_submit">    
    </form>
    @endif
    <br>

    @if($isPersonne == true)
        <form action="{{route('acheter_billet_personne')}}" method="post">
            @csrf
            <input type="hidden" name="nCompetition" value="{{$nCompetition}}">
            <input type="hidden" name="nPersonne" value="{{$nPersonne}}">
            @php
                $x = 0;
            @endphp
            @foreach($reservation as $row)
                <input type="hidden" name="reservation_{{$x}}" value="{{$row->id}}">
                @php 
                    $x++;
                @endphp
            @endforeach
            
            @for ($i = 1; $i <= $nPersonne; $i++)
                Nom de la personne n°{{$i}} :
                <input type="text" name="nom_personne_{{$i}}" class="jo_form-input">
                Prenom de la personne n°{{$i}} :
                <input type="text" name="prenom_personne_{{$i}}" class="jo_form-input">
            @endfor
            <input type="submit" value="Achetez" class="jo_form_submit">
        </form>
    @endif
    <br>

    <table>
        <tr><td>Sport</td><td>Competition</td><td>date</td><td>Heure de début</td><td>Heure de fin</td><td>Prix</td></tr>
        @foreach($tab as $row)
            <tr>
                <td>{{$row->sport->nom}}</td>
                <td>{{$row->nom}}</td>
                <td>{{$row->date}}</td>
                <td>{{$row->heure_de_debut}}</td>
                <td>{{$row->heure_de_fin}}</td>
                <td>{{$row->prix_du_billet}}</td>
            </tr>
        @endforeach
    </table>
@endsection