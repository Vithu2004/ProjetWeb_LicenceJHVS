<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Reservation;
use App\Models\Competition;
use App\Models\Personne;
use App\Models\Sport;

class BilleterieController extends Controller
{
    public function getCompetitionName(){
        $competition = Competition::all();
        $sport = Sport::all();
        return view('billeterie_reservation_form', 
        ["tab" => $competition, "isFiltre" => true, "sport" => $sport, "isCompetition" => false, "nCompetition" => 0,
         "isPersonne" => false, "nPersonne" => "",
         "numero" => "", "email" => "", "reservation" => []]);
    }

    public function gestionFormReservation(Request $request){
        $competition = Competition::all();
        if($request -> get('nPersonne') == null || $request -> get('Telephone') == null || $request -> get('Email') == null || $request -> get('nCompetition') == null){
            return view('operation_failed_champ');
        }
        $nPersonne = $request -> get('nPersonne');
        $numero_telephone = $request -> get('Telephone');
        $email = $request -> get('Email');
        $nCompetition = $request -> get('nCompetition');
        return view('billeterie_reservation_form', 
        ["tab" => $competition, "isFiltre" => false, "sport" => [], "isCompetition" => true, "nCompetition" => $nCompetition,
         "isPersonne" => false, "nPersonne" => $nPersonne,
         "numero" => $numero_telephone, "email" => $email, "reservation" => []]); 
    }

    public function createReservations(Request $request){
        $competition = Competition::all();
        $tab=[];
        $nPersonne = $request -> get('nPersonne');
        $email = $request -> get('Email');
        $numero_telephone = $request -> get('Telephone');
        $nCompetition = $request -> get('nCompetition');
        for($i = 1; $i <= $nCompetition ; $i++){
            if($request -> get('Competition_' . $i) == null){
                return view('operation_failed_champ');
            }
            $reservation = new Reservation();
            $reservation -> nombre = $nPersonne;
            $reservation -> email = $email;
            $reservation -> numero_telephone = $numero_telephone;
            $compet = Competition::where('nom', ($request->get('Competition_' . $i))) -> first();
            $reservation -> competition() -> associate($compet);
            $reservation -> save();
            array_push($tab, $reservation);
        }
        return view('billeterie_reservation_form', 
        ["tab" => $competition, "isFiltre" => false, "sport" => [], "isCompetition" => false, "nCompetition" => $nCompetition,
         "isPersonne" => true, "nPersonne" => $nPersonne,
         "numero" => "", "email" => "", "reservation" => $tab]); 
    }

    public function createPersonnes(Request $request){
        $competition = Competition::all();
        $nPersonne = $request -> get('nPersonne');
        $nCompetition = $request -> get('nCompetition');
        $personnes = [];
        for($i = 1; $i <= $nPersonne ; $i++){
            for($a = 0; $a < $nCompetition; $a++){
                if($request -> get('nom_personne_' . $i) == null || $request -> get('prenom_personne_' . $i) == null){
                    return view('operation_failed_champ');
                }
                $personne = new Personne();
                $personne -> nom = $request -> get('nom_personne_' . $i);
                $personne -> prenom = $request -> get('prenom_personne_' . $i);
                $personne -> reservation() -> associate($request -> get('reservation_' . $a));
                $personne -> save();
                if($a == 0){
                    array_push($personnes, $personne);
                }
            }
        }
        $prix = 0;
        $reservations = [];
        for($i = 0; $i < $nCompetition; $i++){
            $res = Reservation::where("id", ($request -> get('reservation_' . $i))) -> first();
            array_push($reservations, $res);
            $prix = ($res -> nombre) * ($res-> competition -> prix_du_billet ) + $prix;
        }
        return view('achat_complet', ["reservations" => $reservations, "personnes" => $personnes, "prix" => $prix]);
    }

    public function filtreCompetition(Request $request){
        $minimum = $request -> get('Minimum');
        $maximum = $request -> get('Maximum');
        $sports = Sport::all();
        $competition = Competition::where('prix_du_billet', '>',$minimum) -> where('prix_du_billet', '<', $maximum) -> get();
        return view('billeterie_reservation_form', ["tab" => $competition, "isFiltre" => true, "sport" => $sports, "isCompetition" => false, "nCompetition" => 0,
        "isPersonne" => false, "nPersonne" => 0,
        "numero" => "", "email" => "", "reservation" => []]); 
    }
}
