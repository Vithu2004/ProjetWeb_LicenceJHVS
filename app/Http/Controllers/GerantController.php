<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Competition;
use App\Models\Lieu;
use App\Models\Personne;
use App\Models\Reservation;

class GerantController extends Controller
{
    public function goToGerantCompetition(){
        $sport = Sport::all();
        $lieu = Lieu::all();
        $competition = Competition::all();
        $personne = Personne::all();
        $reservation = Reservation::all();
        $spectateurCompetition = [];
        $placeCompetition = [];
        foreach($competition as $compet){
            $nombreDeSpectateur = 0;
            foreach($reservation as $reser){
                if($reser->competition->nom == $compet->nom){
                    $nombreDeSpectateur = $nombreDeSpectateur + $reser->nombre;
                }
            }
            $spectateurCompetition[$compet->nom] = $nombreDeSpectateur;
            $placeRestante = ($compet->lieu->capacite) - $nombreDeSpectateur;
            $placeCompetition[$compet->nom] = $placeRestante;
        }
        return view('gerant_page_competition', 
        ["sport" => $sport, "lieu" => $lieu, "competition" => $competition, "personne" => $personne, 
        "spectateurCompetition" => $spectateurCompetition, "placeCompetition" => $placeCompetition]);
    }

    public function createSport(Request $request){
        if($request -> get('name') == null){
            return view('operation_failed_champ');
        }
        $sport = new Sport();
        $sport->nom =$request->get('name');
        $sport->save();
        return view('operation_success');
    }

    public function createLieu(Request $request){
        if($request -> get('name') == null || $request -> get('capacite') == null){
            return view('operation_failed_champ');
        }
        $lieu = new Lieu();
        $lieu->nom = $request -> get('name');
        $lieu->capacite = $request -> get('capacite');
        $lieu->save();
        return view('operation_success');
    }

    public function createCompetition(Request $request){
        if($request -> get('sport') == null || $request -> get('lieu') == null || $request -> get('nom') == null 
        || $request -> get('date') == null || $request -> get('heure_debut') == null || $request -> get('heure_fin') == null || $request -> get('prix_du_billet') == null){
            return view('operation_failed_champ');
        }
        $competition = new Competition();
        $sport = Sport::where('nom', ($request->get('sport')))->first();
        $competition-> sport() -> associate($sport);
        $lieu = Lieu::where('nom', ($request->get('lieu')))->first();
        $competition-> lieu() -> associate($lieu);
        $competition -> nom = $request ->get('nom');
        $competition->date = $request -> get('date');
        $competition->heure_de_debut = $request -> get('heure_debut');
        $competition->heure_de_fin = $request -> get('heure_fin');
        $competition->prix_du_billet = $request -> get('prix_du_billet');
        $competition->save();
        return view('operation_success');
    }

    public function modificateCompetition(Request $request){
        $nom = $request -> get('nom');
        $competition = Competition::where('nom', $nom)-> first();
        if($request->get('sport') != null){
            $sport = Sport::where('nom', ($request->get('sport')))->first();
            $competition -> sport() -> associate($sport);
        }
        if($request->get('lieu') != null){
            $lieu = Lieu::where('nom', ($request->get('lieu')))->first();
            $competition -> lieu() -> associate($lieu);
        }
        if($request->get('new_nom') != null){
            $competition -> nom = $request ->get('new_nom');
        }
        if($request->get('date') != null){
            $competition->date = $request -> get('date');
        }
        if($request->get('heure_debut') != null){
            $competition->heure_de_debut = $request -> get('heure_debut');
        }
        if($request->get('heure_fin') != null){
            $competition->heure_de_fin = $request -> get('heure_fin');
        }
        if($request->get('prix_du_billet') != null){
            $competition->prix_du_billet = $request -> get('prix_du_billet');
        }
        $competition->save();
        return view('operation_success');
    }

    public function deleteCompetition(Request $request){
        $nom = $request -> get('nom');
        $competition = Competition::where('nom', $nom)->first();
        $competition->delete();
        return view('operation_success');
    }
}
