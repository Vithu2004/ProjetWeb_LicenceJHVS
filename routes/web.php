<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\BilleterieController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
}) -> name('home');

//Billeterie

Route::get('/billeterie', [BilleterieController::class, 'getCompetitionName']) -> name('billeterie');

Route::post('/billeterie_competition', [BilleterieController::class, 'gestionFormReservation']) -> name('acheter_billet');

Route::post('/billeterie_personne', [BilleterieController::class, 'createReservations']) -> name('acheter_billet_competition');

Route::get('/achat_complet', [BilleterieController::class, 'createPersonnes']) -> name('acheter_billet_personne');

Route::post('/billeterie', [BilleterieController::class, 'filtreCompetition'])-> name('filtre_competition');

//Calendrier

Route::get('/calendrier', [CalendrierController::class, 'getSports']) -> name('calendrier');

//Competition

Route::get('/competition', [CompetitionController::class, 'goToCompetition']) -> name('competition');

Route::post('/competition', [CompetitionController::class, 'competitionWithFilter']) -> name('competitionWithFilter');

//Connexion gérant

Route::get('/gerant_connexion', function (){
    return view('gerant_auth');
}) -> name('auth.login');

Route::get('/create-gerant', [AuthController::class, 'create']);

Route::post('/gerant_connexion', [AuthController::class, 'doLogin']) -> name('auth.doLogin');

Route::delete('/logout', [AuthController::class, 'logout']) -> name('auth.logout');
//Gerant

Route::get('/gerant', [GerantController::class, 'goToGerantCompetition']) -> name('gerant');

Route::post('/operation_lieu', [GerantController::class, 'createLieu']) -> name('createLieu');

Route::post('/operation_sport', [GerantController::class, 'createSport']) -> name('createSport');

Route::post('/operation_competition', [GerantController::class, 'createCompetition']) -> name('createCompetition');

Route::post('/operation_modification', [GerantController::class, 'modificateCompetition']) -> name('modificateCompetition');

Route::post('operation_delete', [GerantController::class, 'deleteCompetition']) -> name('deleteCompetition');