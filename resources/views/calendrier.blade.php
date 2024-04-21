@extends('template')

@section('title')
    Calendrier des compétitions
@endsection

@section('content')
    <div class="jo-calendrier container-fluid">
        @php
            $x = 26;
            $month = "juillet";
        @endphp
        <div class="row">

            <div class="col jo-calendrier-heure-heure">
                <p class="row">Calendrier</p>
                @for($i = 0; $i <= 23; $i++)
                    <p class="row">{{$i}}h00</p>
                @endfor
            </div>
            @while($x !=12)
                @if($x == 32)
                    @php
                        $x = 1;
                        $month = "aout";
                    @endphp
                @endif
                <div class="col jo-calendrier-jour-{{$x}}">
                    <p class="row">{{$x}} {{$month}}</p>
                    @for($y = 0; $y <= 23; $y++)
                    <div class="row jo-calendrier-heure {{$y}}">
                        @foreach($competition as $row)
                            @if(($row->date == ("2024-07-" . $x) || $row->date == ("2024-08-0" . $x)  || $row->date == ("2024-08-" . $x)) && $row->heure_de_debut <= $y && $row->heure_de_fin -1 >= $y)
                                <div class="bg-danger jo-calendrier-sport">
                                    {{$row->nom}}, 
                                    <p class="jo-calendrier-sport-detail">Sport : {{$row->sport->nom}}, Lieu : {{$row->lieu->nom}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endfor
                </div>
                @php
                    $x++;
                @endphp
            @endwhile
        </div>
    </div>

@endsection
