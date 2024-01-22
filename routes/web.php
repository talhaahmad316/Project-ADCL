<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




use App\Http\Controllers\AdminTournamentController;
use App\Http\Controllers\TournamentMatchController;
use App\Http\Controllers\AdclTeamsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// register
Route::get('/register-user', [RegisteredUserController::class, 'create'])->name('register-create');
Route::post('/register-store', [RegisteredUserController::class, 'store'])->name('register-store');
// register end

// login start
Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
// login end

// logout
Route::get('/admin/logout', [ProfileController::class, 'logout'])->name('logout');
// logout



Route::group(['middleware' => ['admin_auth']], function () {
Route::get('/admin/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/logout', [ProfileController::class, 'logout'])->name('logout');
});

Route::get('/', [AdclTeamsController::class, 'home'])->name('home');
Route::get('rules-regulations', [AdclTeamsController::class, 'rulesRegulations'])->name('rulesRegulations');
Route::get('contact', [AdclTeamsController::class, 'contact'])->name('contact');
Route::get('about', [AdclTeamsController::class, 'about'])->name('about');
Route::get('season-ranking', [AdclTeamsController::class, 'ranking'])->name('ranking');

// routes/web.php
Route::get('/adclReds', [TeamController::class, 'adclRedsPlayers'])->name('adclReds.players');
Route::get('/adclGreens', [TeamController::class, 'adclGreensPlayers'])->name('adclGreens.players');
Route::get('/adclYellows', [TeamController::class, 'adclYellowsPlayers'])->name('adclYellows.players');
Route::get('/adclBlues', [TeamController::class, 'adclBluesPlayers'])->name('adclBlues.players');
Route::get('/adclGreys', [TeamController::class, 'adclGreysPlayers'])->name('adclGreys.players');
Route::get('/adclBlacks', [TeamController::class, 'adclBlacksPlayers'])->name('adclBlacks.players');

//all Player
Route::get('/adclAll', [PlayerController::class, 'showAllPlayers'])->name('adclAll');


// Route for adding a player
Route::get('/admin/players/add', [PlayerController::class, 'create'])->name('players.create');
Route::post('/admin/players', [PlayerController::class, 'store'])->name('players.store');

// Route for searching players
Route::get('/admin/players/search', [PlayerController::class, 'search'])->name('players.search');

// Route for viewing a player's details
Route::get('/admin/players/{player}', [PlayerController::class, 'view'])->name('players.view');

// Route for editing a player
Route::get('/admin/players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
Route::put('/admin/players/{player}', [PlayerController::class, 'update'])->name('players.update');

// Route for deleting a player
Route::delete('/admin/players/{player}', [PlayerController::class, 'destroy'])->name('players.delete');

// Team Routes
// Route for adding a new team
Route::get('/admin/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
Route::post('/admin/teams', [TeamController::class, 'store'])->name('admin.teams.store');
Route::get('admin/teams/search', [TeamController::class, 'search'])->name('admin.teams.search');
Route::get('admin/teams/{team}/view', [TeamController::class, 'view'])->name('admin.teams.view');
Route::get('admin/teams/{team}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
Route::put('admin/teams/{team}', [TeamController::class, 'update'])->name('admin.teams.update');
Route::delete('/admin/teams/{team}', 'TeamController@destroy')->name('admin.teams.destroy');


// Route to handle the form submission
Route::post('/teams/add-players/{team}', [TeamController::class, 'addPlayers'])->name('teams.addPlayers');

//Route for Tournaments

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tournaments/create', [AdminTournamentController::class, 'create'])->name('tournaments.create');
    Route::post('/tournaments/store', [AdminTournamentController::class, 'store'])->name('tournaments.store');
    Route::get('/tournaments/search', [AdminTournamentController::class, 'search'])->name('tournaments.search');
});

Route::get('/admin/tournaments/{tournament}', [AdminTournamentController::class, 'view'])->name('admin.tournaments.view');
Route::get('/admin/tournaments/{tournament}/edit', [AdminTournamentController::class, 'edit'])->name('admin.tournaments.edit');
Route::put('admin/tournaments/{tournament}', [AdminTournamentController::class, 'update'])->name('admin.tournaments.update');

//add team in tournament

Route::post('/admin/tournaments/{tournament}/add-teams', [AdminTournamentController::class, 'addTeams'])->name('admin.tournaments.addTeams');
//matches
Route::get('/admin/matches/add', [TournamentMatchController::class, 'create'])->name('admin.matches.create');
Route::post('/admin/matches/store', [TournamentMatchController::class, 'store'])->name('admin.matches.store');

Route::get('/admin/matches/{match}/edit', [TournamentMatchController::class, 'edit'])->name('admin.matches.edit');
Route::put('/admin/matches/{match}', [TournamentMatchController::class, 'update'])->name('admin.matches.update');
Route::delete('/admin/matches/{id}', [TournamentMatchController::class, 'store'])->name('admin.matches.destroy');
Route::delete('/admin/teams/{id}', 'TeamController@destroy')->name('admin.teams.destroy');
Route::delete('/admin/tournaments/{id}', 'TournamentController@destroy')->name('admin.tournaments.destroy');
