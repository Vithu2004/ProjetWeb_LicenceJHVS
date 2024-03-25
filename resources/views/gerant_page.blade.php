@extends('template')

@section('title')
    Gerant :
@endsection

@section('content')
    <form action="{{route('createSport')}}" method="post" class="jo-createSportForm">
        @csrf
        Créer un sport
        <input type="text" name="name" class="jo-form-input">
        <input type="submit" value="Créer" class="jo_form_submit">
    </form>
    
    <form action="{{route('createLieu')}}" method="post">
        @csrf
        <input type="text" name="name" class="jo_form-input">
        <input type="text" name="capacite" class="jo_form-input">
        <input type="submit" value="Créer" class="jo_form_submit">
    </form>

    <form action="{{route('createCompetition')}}" method="post" class="jo-createCompetitionForm">
        @csrf
        Créer une competition
        Nom :
        <input type="text" name="nom" class="jo_form-input">
        Sport :
        <input type="text" name="sport" class="jo_form-input">
        Lieu :
        <input type="text" name="lieu" class="jo_form-input">
        Date :
        <input type="tel" name="date" class="jo_form-input">
        Heure de Début :
        <input type="tel" name="heure_debut" class="jo_form-input">
        Heure de Fin :
        <input type="tel" name="heure_fin" class="jo_form-input">
        Prix du Billet :
        <input type="tel" name="prix_du_billet" class="jo_form-input">
        <input type="submit" value="Créer" class="jo_form_submit">
    </form>
@endsection