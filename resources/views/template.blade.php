<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        tr, td{
            border : 2px solid black;
        }

        .jo-calendrier-heure-heure > p{
            height : 35px;
        }

        .jo-calendrier-heure {
            height: 50px;
            border : 1px solid lightgray;
        }

        .jo-calendrier-sport{
            height : 50%;
            display : flex;
            justify-content : center;
            align-items : center;
            color : white;
            background: darkred;
            font-size : 1vw;
            overflow : hidden;
        }

        .jo-calendrier-sport .jo-calendrier-sport-detail{
            display : none;
        }

        .jo-calendrier-sport:hover{
            width : 350px;
            height : 100%;
        }

        .jo-calendrier-sport:hover .jo-calendrier-sport-detail{
            display : block;
        }

        .jo-form{
            display : flex;
            flex-direction : column;
        }

        .jo-form input{
            max-width : 300px;
        }

        .gerant, .billeterie, .achat, .competition{
            display : flex;
            flex-direction : column;
            justify-content : center;
            align-items : center;
        }

        .jo-navbar{
            padding-left : 100px;
        }

        .jo-home-div{
            margin-top : 32px;
            display : flex;
            flex-direction : column;
            justify-content : center;
            align-items : center;
            text-align : center;
        }

        .home-p{
            width : 75%;
        }

        .jo-home-calbil{
            margin-top : 32px;
            display : flex;
            flex-direction : row;
            gap : 32px;
        }

        .jo-home-calendrier{
            padding-left : 32px; 
            padding : 32px;
            background : linear-gradient(120deg, darkblue, blue);
            border-radius : 16px;
            border-top-left-radius : 0;
            border-bottom-left-radius : 0;
            color : white;
        }

        .jo-home-billet{
            padding-left : 32px; 
            padding : 32px;
            background : linear-gradient(120deg, blue, darkblue);
            border-radius : 16px;
            border-top-right-radius : 0;
            border-bottom-right-radius : 0;
            color : white;
        }

        .footer{
            height : 150px;
            display : flex;
            justify-content : center;
            align-items : center;
        }
        
    </style>
</head>
<body>
    <!-- <div class="navbar">
        <p>JO PARIS 2024</p>
        <a href="{{route('gerant')}}">Gérant</a>
        <a href="{{route('billeterie')}}">Billeterie</a>
        <a href="{{route('calendrier')}}">Calendrier</a>
        <a href="{{route('competition')}}">Competition</a>
    </div> -->

    <nav class="jo-navbar navbar navbar-expand-lg navbar-light bg-primary-subtle">
        <a class="navbar-brand" href="{{route('home')}}">JO PARIS 2024</a>
        <div class="navbar">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('billeterie')}}">Billeterie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('calendrier')}}">Calendrier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('competition')}}">Competition</a>
            </li>
            </ul>
        </div>
    </nav>
    
    @yield('content')
</body>
</html>