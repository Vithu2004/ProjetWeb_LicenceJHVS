<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Competition;
use App\Models\Lieu;

class GerantController extends Controller
{
    public function createSport(Request $request){
        $sport = new Sport();
        $sport->nom =$request->get('name');
        $sport->save();
    }

    public function createCompetition(Request $request){
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
    }

    public function createLieu(Request $request){
        $lieu = new Lieu();
        $lieu->nom = $request -> get('name');
        $lieu->capacite = $request -> get('capacite');
        $lieu->save();
    }
}
