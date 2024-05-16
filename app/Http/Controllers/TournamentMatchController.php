<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\Tournament;
use App\Models\Team;

class TournamentMatchController extends Controller
{
    public function index()
    {
        $matches = Matches::all();
        $tournaments = Tournament::pluck('tournamentname', 'id');
        return view('admin.matches.searchMatch', compact('matches'));
    }
    public function create()
    {
        $allTeams = Team::all();
        $selectedTeamIds = session('selected_teams', []);
        // Retrieve remaining teams
        $remainingTeams = $allTeams->reject(function ($team) use ($selectedTeamIds) {
            return in_array($team->id, $selectedTeamIds);
        });
        $tournaments = Tournament::pluck('tournamentname', 'id');
        return view('admin.matches.addMatch', compact('allTeams', 'selectedTeamIds', 'remainingTeams', 'tournaments'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matchName' => 'required|string',
            'home_team' => 'required',
            'away_team' => 'required',
            'other_home_team' => 'nullable|string',
            'other_away_team' => 'nullable|string',
            'tournament_id' => 'required',
            'matchNo' => 'required|integer',
            'matchDate' => 'required|date',
            'format' => 'string|nullable',
            'week' => 'integer|nullable',
            'startTime' => 'date_format:H:i|nullable',
            'finishTime' => 'date_format:H:i|nullable',
            'reportingTime' => 'date_format:H:i|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('matches'), $imageName); // Move the file to the public directory
            $validatedData['image'] = $imageName;
        }
        if ($validatedData['home_team'] === 'other') {
            $validatedData['home_team'] = $validatedData['other_home_team'];
        }
        if ($validatedData['away_team'] === 'other') {
            $validatedData['away_team'] = $validatedData['other_away_team'];
        }
        Matches::create($validatedData);

        return redirect()->route('admin.matches.search');
    }
    public function view($id)
    {
        $match = Matches::findOrFail($id);
        $tournaments = Tournament::pluck('tournamentname', 'id');
        return view('admin.matches.view', compact('match'));
    }
    public function edit($id)
    {
        $allTeams = Team::all();
        $selectedTeamIds = session('selected_teams', []);
        // Retrieve remaining teams
        $remainingTeams = $allTeams->reject(function ($team) use ($selectedTeamIds) {
            return in_array($team->id, $selectedTeamIds);
        });
        $match = Matches::find($id);
        $tournaments = Tournament::pluck('tournamentname', 'id');
        $selectedTournamentId = $match->tournament_id;
        return view('admin.matches.edit', compact('allTeams', 'selectedTeamIds', 'remainingTeams', 'match', 'tournaments', 'selectedTournamentId'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'matchName' => 'required|string',
            'home_team' => 'required',
            'away_team' => 'required',
            'other_home_team' => 'nullable|string',
            'other_away_team' => 'nullable|string',
            'tournament_id' => 'required',
            'matchNo' => 'required|integer',
            'matchDate' => 'required|date',
            'format' => 'string|nullable',
            'week' => 'integer|nullable',
            'startTime' => 'nullable',
            'finishTime' => 'nullable',
            'reportingTime' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);
        $match = Matches::find($id);
        if ($request->hasFile('image')) {
            $oldImagePath = public_path($match->image);
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('matches'), $imageName);
            $validatedData['image'] = $imageName;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        if ($validatedData['home_team'] === 'other') {
            $validatedData['home_team'] = $validatedData['other_home_team'];
        }
        if ($validatedData['away_team'] === 'other') {
            $validatedData['away_team'] = $validatedData['other_away_team'];
        }
        $match->update($validatedData);

        return redirect()->route('admin.matches.search');
    }
    public function destroy($id)
    {
        $match = Matches::find($id);
        if ($match) {
            $oldImagePath = public_path('images/' . $match->image);
            $match->delete();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            return redirect()->route('admin.matches.search')->with('success', 'Match deleted successfully');
        } else {
            return redirect()->route('admin.matches.search')->with('error', 'Match not found');
        }
    }

}
