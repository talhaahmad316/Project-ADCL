<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\QueryException;


use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Team;
use App\Models\Player;

class TeamController extends Controller
{
    public function create()
    {
        $clubs = Club::all();
        return view('admin.teams.addTeam', get_defined_vars());
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'club' => 'required|string',
            'status' => 'required|in:active,inactive',
            'description' => 'required|string',
        ]);
        // Upload the logo and store team data
        $data = $request->except('_token');
        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path(), $imageName);
            $data['logo'] = $imageName;
        }
        Team::create($data);
        return redirect()->route('admin.teams.search')->with('success', 'Team added successfully!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $teams = Team::where('name', 'like', "%$search%")
            ->orWhere('club', 'like', "%$search%")
            ->paginate(8);
        $players = Player::all();
        return view('admin.teams.search', compact('teams', 'players'));
    }
    public function view(Team $team)
    {
        $teamWithPlayers = Team::with('players')->find($team->id);
        return view('admin.teams.view', compact('team', 'teamWithPlayers'));
    }
    public function edit(Team $team)
    {
        $teams = Team::all();
        $clubs = Club::all();
        return view('admin.teams.edit', get_defined_vars());
    }
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
            'club' => 'required|string',
            'status' => 'required|in:active,inactive',
            'description' => 'required|string',
        ]);
        // Find the team by ID
        $team = Team::findOrFail($id);
        // Update the team data
        $team->name = $request->input('name');
        $team->club = $request->input('club');
        $team->status = $request->input('status');
        $team->description = $request->input('description');
        // Handle logo update if provided
        if ($request->hasFile('logo')) {
            // Get the old image path
            $oldImagePath = public_path($team->logo);
            $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path(), $imageName);
            $team->logo = $imageName;
            // Delete old picture
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        // Save the updated team data
        $team->save();
        return redirect()->route('admin.teams.search')->with('success', 'Team updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            // Get the image path before deleting the team
            $imagePath = public_path($team->logo);
            $team->delete();
            // this if loop is not working yet
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            return redirect()->route('admin.teams.search')->with('success', 'Team deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Cannot delete team. It is referenced in other records.');
        }
    }
    public function addPlayers(Request $request, Team $team)
    {
        // Validate the request data
        $request->validate([
            'selected_players' => 'required|array',
            'selected_players.*' => 'exists:players,id', // Make sure the selected players exist in the 'players' table
        ]);
        // Attach selected players to the team
        $team->players()->attach($request->input('selected_players'));

        return redirect()->back()->with('success', 'Players added to the team successfully');
    }
    public function playerDestroy(Request $request, Team $team)
    {
        $playerId = $request->input('player_id');
        $team->players()->detach($playerId);
        return redirect()->back()->with('success', 'Player removed from the team successfully.');
    }

    public function playerdetail($id)
    {
        $team = Team::with('players')->findOrFail($id);
        return view('ADCL.adcl2', compact('team'));
    }
}