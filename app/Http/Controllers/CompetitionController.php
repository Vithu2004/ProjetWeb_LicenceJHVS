<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Sport;

class CompetitionController extends Controller
{
    public function goToCompetition(){
        $sport = Sport::all();
        $competition = Competition::all();
        return view('competition', ["sport" => $sport, "competition" => $competition]);
    }

    public function competitionWithFilter(Request $request){
        $sports = Sport::all();
        if($request -> get('sport') == null && $request -> get('date') == null){
            $competition = Competition::where('prix_du_billet', '<', ($request -> get('maximum')))->get();
            return view('competition', ["sport" => $sports, "competition" => $competition]);
        }
        if($request-> get('sport') != null && $request -> get('date') != null){
            $sport = Sport::where('nom', ($request -> get('sport')))->first();
            $competition = Competition::where('sport_id', $sport->id)->where('date', ($request -> get('date')))->where('prix_du_billet', '<', ($request -> get('maximum')))->get();
            return view('competition', ["sport" => $sports, "competition" => $competition]);
        }
        if($request -> get('sport') != null && $request -> get('date') == null){
            $sport = Sport::where('nom', ($request -> get('sport')))->first();
            $competition = Competition::where('sport_id', $sport->id)->where('prix_du_billet', '<', ($request -> get('maximum')))->get();
            return view('competition', ["sport" => $sports, "competition" => $competition]);
        }
        if($request -> get('sport') == null && $request -> get('date') != null){
            $competition = Competition::where('date', ($request -> get('date')))->where('prix_du_billet', '<', ($request -> get('maximum')))->get();
            return view('competition', ["sport" => $sports, "competition" => $competition]);
        }
        return view('competition', ["sport" => $sports, "competition" => (Competition::all())]);
    }


}
