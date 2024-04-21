@extends('template')

@section('title')
    Home
@endsection

@section('content')
    <div class="jo-home-div">
        <p class="home-p">
        Bienvenue aux Jeux Olympiques, l'événement mondial qui célèbre l'unité, l'excellence et la passion du sport. Des athlètes venus des quatre coins du globe se réunissent pour défendre les couleurs de leur pays, repoussant les limites de l'humain et inspirant des millions de personnes à travers le monde.
        </p>
        <p class="home-p">
        Dans l'effervescence de la compétition, nous sommes témoins de moments inoubliables de triomphe et de défi, où la force de l'esprit rencontre la puissance du corps. Des histoires de courage, de persévérance et de détermination émergent, gravant dans nos mémoires des exemples de ce que signifie vraiment être un champion.
        </p>
        <p class="home-p">
        Au-delà des médailles et des records, les Jeux Olympiques sont une célébration de la diversité et de l'inclusion, un reflet de la richesse de notre monde. Athlètes de toutes origines, cultures et horizons se rassemblent dans un esprit de fair-play et de respect mutuel, incarnant l'idéal olympique de fraternité.
        </p>
        <p class="home-p">
        Que ces Jeux Olympiques inspirent chacun d'entre nous à viser l'excellence dans nos propres parcours, à surmonter les obstacles avec détermination et à construire un avenir où le sport continue de nous unir, au-delà des frontières et des différences. Puissent ces jours de compétition rester gravés dans nos cœurs comme une source d'inspiration et d'espoir pour un monde meilleur.
        </p>
    </div>
    <div class="jo-home-calbil">
        <div class="jo-home-calendrier">
            <p>
                Êtes-vous prêt(e) pour l'action olympique ? Les Jeux Olympiques sont l'apogée de la compétition sportive mondiale, et vous ne voulez rien manquer des moments historiques qui s'annoncent !
            </p>
            <p>
                Consultez notre calendrier officiel des Jeux Olympiques pour découvrir toutes les compétitions à venir. Des épreuves de natation aux courses sur piste, en passant par les matchs de basket-ball et les combats de judo, notre calendrier détaillé vous donne un aperçu complet de chaque événement.
            </p>
                Que vous soyez un fervent admirateur de sports ou simplement curieux de découvrir de nouveaux talents, les Jeux Olympiques offrent une expérience inoubliable pour tous. Rejoignez-nous dans l'excitation et la passion de cette célébration mondiale du sport.
            <p>
                Cliquez sur le lien ci-dessous pour accéder à notre calendrier des Jeux Olympiques et commencez à planifier votre programme dès maintenant !
            </p>
            <a href="{{route('calendrier')}}">
                Consulter le Calendrier des Jeux Olympiques
            </a>
        </div>

        <div class= "jo-home-billet">
            <p>
            Les Jeux Olympiques approchent à grands pas et l'excitation est à son comble ! Ne manquez pas cette chance unique d'assister à l'un des événements sportifs les plus prestigieux au monde.
            </p>
            <p>
            Réservez dès maintenant vos billets pour les Jeux Olympiques et garantissez-vous une expérience inoubliable. Que ce soit pour vibrer au rythme des compétitions de gymnastique, encourager votre équipe préférée lors des matchs de basketball ou assister à l'émotion des épreuves d'athlétisme, il y en a pour tous les goûts et toutes les passions.
            </p>
            <p>
            Ne tardez pas ! Les billets s'envolent rapidement et vous ne voulez pas rater cette opportunité de faire partie de l'histoire olympique. Réservez dès maintenant pour vous assurer les meilleures places et préparez-vous à vivre des moments de pure magie sportive.
            </p>
            <p>
            Cliquez sur le lien ci-dessous pour réserver vos billets dès maintenant :
            </p>
            <a href="{{route('billeterie')}}">
            Commandez Vos Billets
            </a>
        </div>
    </div>
    <br>
    
    <div class="footer bg-primary-subtle">
        Si tu es gérant :
        <a href="{{route('auth.login')}}">Gérant</a>
    </div>
@endsection