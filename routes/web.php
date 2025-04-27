<?php

use App\Http\Controllers\CricketTournament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cricket', [CricketTournament::class, 'index'])->name('cricket');

Route::post('/save-team', [CricketTournament::class, 'saveTeam'])->name('team.save');

Route::post('/update-team', [CricketTournament::class, 'update'])->name('team.update');

Route::get('/delete-team/{team_id}',[CricketTournament::class,'delete'])->name('team.delete');

Route::get('/player-list/{team_id}', [PlayerController::class, 'index'])->name('player-list');

Route::post('/save-player', [PlayerController::class, 'savePlayer'])->name('save.player');

Route::post('/update-player', [PlayerController::class, 'update'])->name('player.update');

Route::get('/delete-player/{player_id}', [PlayerController::class, 'delete'])->name('player.delete');