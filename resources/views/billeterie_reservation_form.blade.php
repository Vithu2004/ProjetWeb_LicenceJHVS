@extends('template')

@section('title')
    Billeterie
@endsection

@section('content')
    <form action="{{route('acheter_billet')}}" method="post">
        @csrf
        Nombre de Personne :
        <input type="text" name="Nombre" class="jo_form-input">
        Telephone : 
        <input type="text" name="Telephone" class="jo_form-input">
        Email :
        <input type="text" name="Email" class="jo_form-input">

        Choix de la competition : 
        <input list="Competition" name="Competition" class="jo_form-input">
        <datalist id="Competition">
            @foreach($tab as $row)
                <option value="{{$row->nom}}"></option>
            @endforeach
        </datalist>

        <input type="submit" value="Envoyez" class="jo_form_submit">
    </form>
    @if($isPersonne == true)
        <form action="{{route('acheter_billet_personne')}}" method="post">
            @csrf
            <input type="text" name="Reservation" value="{{$reservation}}">
            @for ($i = 1; $i <= $n; $i++)
                Nom de la personne n°{{$i}} :
                <input type="text" name="nom_personne_{{$i}}" class="jo_form-input nom_personne_{{$i}}">
                Prenom de la personne n°{{$i}} :
                <input type="text" name="prenom_personne_{{$i}}" class="jo_form-input">
            @endfor
            <input type="submit" value="Achetez" class="jo_form_submit">
        </form>
    @endif
@endsection