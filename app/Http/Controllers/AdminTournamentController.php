<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\TournamentMatch;


class AdminTournamentController extends Controller
{
    public function create()
    {
        return view('admin.tournaments.addTournament');
    }
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'tournamentname' => 'required',
            'tournamentLocation' => 'required',
            'tournamentCountry' => 'required',
            'tournamentStartTime' => 'required|date',
            'tournamentEndTime' => 'required|date|after_or_equal:tournamentStartTime',
            'tournamentStatus' => 'required',
            'format' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        // Handle image upload and store
        if ($request->hasFile('banner_image')) {
            $imagePath = $request->file('banner_image')->store('tournament_images', 'public');
            $validatedData['banner_image'] = $imagePath;
            // $validatedData['banner_image'] = $imagePath;
        }
        // Create a new tournament record
        Tournament::create($validatedData);
        return redirect()->route('admin.tournaments.search')
            ->with('success', 'Tournament added successfully.');
    }
    public function view(Tournament $tournament)
    {
        $tournamentWithTeams = Tournament::with('teams')->find($tournament->id);
        return view('admin.tournaments.view', compact('tournament', 'tournamentWithTeams'));
    }
    public function edit(Tournament $tournament, TournamentMatch $match)
    {
        $allTeams = Team::all();
        $selectedTeamIds = $tournament->teams->pluck('id')->toArray();
        return view('admin.tournaments.editTournament', compact('tournament', 'allTeams', 'match', 'selectedTeamIds'));
    }
    public function update(Request $request, Tournament $tournament)
    {
        // Validate form data for updating
        $validatedData = $request->validate([
            'tournamentname' => 'required',
            'tournamentLocation' => 'required',
            'tournamentCountry' => 'required',
            'tournamentStartTime' => 'required|date',
            'tournamentEndTime' => 'required|date|after_or_equal:tournamentStartTime',
            'tournamentStatus' => 'required',
            'format' => 'required',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Handle image upload and store (if a new image is provided)
        if ($request->hasFile('banner_image')) {
            $imagePath = $request->file('banner_image')->store('tournament_images', 'public');
            $validatedData['banner_image'] = $imagePath;
            // Delete existing image and upload new one
            if ($tournament->banner_image) {
                $oldImagePath = public_path('storage/' . $tournament->banner_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }
        // Update the tournament record
        $tournament->update($validatedData);
        return redirect()->route('admin.tournaments.search', ['tournament' => $tournament])
            ->with('success', 'Tournament updated successfully.');
    }
    public function destroy($id)
    {
        // Find the Players by ID
        $tournament = Tournament::find($id);
        // Check if the tournament exists
        if ($tournament) {
            if ($tournament->banner_image) {
                // image will also delete from the public file
                $imagePath = public_path('storage/' . $tournament->banner_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Delete the tournament
            $tournament->delete();
            // Redirect back with success message
            return redirect()->route('admin.tournaments.search')->with('success', 'tournament deleted successfully');
        }
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $searchResults = Tournament::where('tournamentname', 'like', '%' . $searchTerm . '%')
            ->orWhere('tournamentCountry', 'like', '%' . $searchTerm . '%')
            ->paginate(10);
        $allTeams = Team::all(); // Fetch all teams
        return view('admin.tournaments.searchTournament', compact('searchResults', 'allTeams'));
    }
    public function sort(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $sortColumn = $request->input('sortColumn', 'tournamentname');
        $sortOrder = $request->input('sortOrder', 'asc');

        $searchResults = Tournament::query()
            ->where('tournamentname', 'like', "%$searchTerm%")
            ->orderBy($sortColumn, $sortOrder)
            ->paginate(10);

        return view('admin.tournaments.search', [
            'searchResults' => $searchResults,
            // Errror
            // 'allTeams' => $allTeams, // Fetch your team data here
        ]);
    }
    public function addTeams(Request $request, Tournament $tournament)
    {
        $selectedTeamIds = $request->input('teams', []);
        // Attach selected teams to the tournament
        $tournament->teams()->attach($selectedTeamIds);
        return redirect()->route('admin.tournaments.search')
            ->with('success', 'Teams added to the tournament successfully.');
    }
    public function teamDestroy(Request $request, Tournament $tournament)
    {
        $teamId = $request->input('team_id');
        $tournament->teams()->detach($teamId);
        return redirect()->back();
    }
}