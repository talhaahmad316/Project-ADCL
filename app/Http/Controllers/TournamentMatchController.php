<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TournamentMatch;
use App\Models\Team;

class TournamentMatchController extends Controller
{
    public function create()
    {
        $allTeams = Team::all();
        $selectedTeamIds = session('selected_teams', []);
        $remainingTeams = $allTeams->reject(function ($team) use ($selectedTeamIds) {
            return in_array($team->id, $selectedTeamIds);
        });
        return view('admin.matches.addMatch', compact('allTeams', 'selectedTeamIds', 'remainingTeams'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matchName' => 'required|string',
            'team_id' => 'required_without:other_team|string', // Validate team_id unless other_team is provided
            'other_team' => 'required_if:team_id,other|string',
            'matchNo' => 'required|integer',
            'matchDate' => 'required|date',
            'format' => 'string|nullable',
            'week' => 'integer|nullable',
            'startTime' => 'date_format:H:i|nullable',
            'finishTime' => 'date_format:H:i|nullable',
            'reportingTime' => 'date_format:H:i|nullable',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        TournamentMatch::create($validatedData);
        return redirect()->route('admin.matches.create')->with('success', 'Match is added in Tournamnet successfully.');
    }
}
