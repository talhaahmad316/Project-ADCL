<?php

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
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MyClubController;
use App\Http\Controllers\MyclubsController;

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


Route::get('/users-edit/{id}', [ProfileController::class, 'edit'])->name('user-edit');
Route::get('/users-delete/{id}', [ProfileController::class, 'destroy'])->name('user-destroy');
Route::post('/users-update/{id}', [ProfileController::class, 'update'])->name('user-update');

// register
Route::get('/admin/register-user', [RegisteredUserController::class, 'create'])->name('register-create');
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

// club crud
Route::get('/admin/club-create', [ClubController::class, 'create'])->name('club-create');
Route::post('/admin/club', [ClubController::class, 'store'])->name('club-store');
Route::get('/admin/club-search', [ClubController::class, 'index'])->name('club-search');
Route::get('/admin/club-delete/{id}', [ClubController::class, 'destroy'])->name('club-destroy');
Route::get('/admin/club-edit/{id}', [ClubController::class, 'edit'])->name('club-edit');
Route::post('/admin/club-update/{id}', [ClubController::class, 'update'])->name('club-update');

Route::post('/my-club/store', [MyClubController::class, 'store'])->name('my-club.store');

// users
Route::get('/admin/users', [ProfileController::class, 'users'])->name('admin.users');

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
Route::put('/admin/players/{id}', [PlayerController::class, 'update'])->name('players.update');

// Route for deleting a player
Route::delete('/admin/players/{player}', [PlayerController::class, 'destroy'])->name('players.delete');

// Team Routes
// Route for adding a new team
Route::get('/admin/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
Route::post('/admin/teams', [TeamController::class, 'store'])->name('admin.teams.store');
Route::get('admin/teams/search', [TeamController::class, 'search'])->name('admin.teams.search');
Route::get('admin/teams/{team}/view', [TeamController::class, 'view'])->name('admin.teams.view');
Route::get('admin/teams/{team}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
Route::put('admin/teams/{id}', [TeamController::class, 'update'])->name('admin.teams.update');

Route::get('/admin/teams/{id}', [ClubController::class, 'teamDestroy'])->name('team-delete');

// Route to handle the form submission
Route::post('/teams/add-players/{team}', [TeamController::class, 'addPlayers'])->name('teams.addPlayers');
Route::delete('/team/{team}/player', [TeamController::class, 'playerDestroy'])->name('team.player.destroy');
Route::get('/player-detail/{id}', [TeamController::class, 'playerdetail'])->name('playerdetail');

//Route for Tournaments
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tournaments/create', [AdminTournamentController::class, 'create'])->name('tournaments.create');
    Route::post('/tournaments/store', [AdminTournamentController::class, 'store'])->name('tournaments.store');
    Route::get('/tournaments/search', [AdminTournamentController::class, 'search'])->name('tournaments.search');
});

Route::get('/admin/tournaments/{tournament}', [AdminTournamentController::class, 'view'])->name('admin.tournaments.view');
Route::get('/admin/tournaments/{tournament}/edit', [AdminTournamentController::class, 'edit'])->name('admin.tournaments.edit');
Route::put('admin/tournaments/{tournament}', [AdminTournamentController::class, 'update'])->name('admin.tournaments.update');
Route::delete('admin/tournaments/{tournament}', [AdminTournamentController::class, 'destroy'])->name('admin.tournaments.destroy');

Route::delete('/tournament/{tournament}/player', [AdminTournamentController::class, 'teamDestroy'])->name('tournament.team.destroy');

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