<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\Tournament;
use App\Models\Team;

class TournamentMatchController extends Controller
{
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
            'other_home_team' => 'nullable|string', // Add validation for custom team names
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
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        if ($validatedData['home_team'] === 'other') {
            $validatedData['home_team'] = $validatedData['other_home_team'];
        }
    
        if ($validatedData['away_team'] === 'other') {
            $validatedData['away_team'] = $validatedData['other_away_team'];
        }
        Matches::create($validatedData);

        return redirect()->route('admin.matches.create')->with('success', 'Match is added in Tournamnet successfully.');
    }

}
