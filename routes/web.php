<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\BilleterieController;

Route::get('/', function () {
    return view('home');
});

Route::get('/gerant', function () {
    return view('gerant_page');
}) -> name('gerant');

Route::get('/billeterie', [BilleterieController::class, 'getCompetitionName']) -> name('billeterie');

Route::post('/billeterie_competition', [BilleterieController::class, 'gestionFormReservation']) -> name('acheter_billet');

Route::post('/billeterie_personne', [BilleterieController::class, 'createReservations']) -> name('acheter_billet_competition');

Route::post('achat_complet', [BilleterieController::class, 'createPersonnes']) -> name('acheter_billet_personne');

Route::post('/v', [GerantController::class, 'createLieu']) -> name('createLieu');

Route::post('/a', [GerantController::class, 'createSport']) -> name('createSport');

Route::post('/s', [GerantController::class, 'createCompetition']) -> name('createCompetition');