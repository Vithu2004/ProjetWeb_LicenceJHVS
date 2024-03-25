<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Reservation;
use App\Models\Competition;
use App\Models\Personne;

class BilleterieController extends Controller
{
    public function getCompetitionName(){
        $competition = Competition::all();
        return view('billeterie_reservation_form', ["tab" => $competition, "isPersonne" => false, "n" => 0]);
    }
    
    public function createReservation(Request $request){
        $reservation = new Reservation();
        $reservation -> nombre = $request -> get('Nombre');
        $reservation -> numero_telephone = $request -> get('Telephone');
        $reservation -> email = $request -> get('Email');
        $competition = Competition::where('nom', ($request -> get('Competition'))) -> first();
        $reservation -> competition() -> associate($competition);
        $reservation -> save();
        $competition = Competition::all();
        return view('billeterie_reservation_form', ["tab" => $competition, "isPersonne" => true, "n" => ($request -> get('Nombre')), "reservation" => ($reservation -> id)]);
    }

    public function createPersonnes(Request $request){
        $reservation = Reservation::where('id', ($request -> get('Reservation')))->first();
        for($i = 1; $i <= $reservation->nombre; $i++){
            $personne = new Personne();
            $personne -> nom = $request -> get('nom_personne_' . $i);
            $personne -> prenom = $request -> get('prenom_personne_' . $i);
            $personne -> reservation() -> associate($request -> get('Reservation'));
            $personne -> save();
        }
    }
}
