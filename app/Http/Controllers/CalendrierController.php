<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CalendrierController extends Controller
{
    public function getSports(){
        $competition = Competition::all();
        return view('calendrier', ["competition" => $competition]);
    }
}
