<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\QueryException;


use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;
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
        // if ($request->hasFile('logo')) {
        //     $imagePath = $request->file('logo')->store('team_logos', 'public');
        //     $data['logo'] = $imagePath;
        // }

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
        return view('admin.teams.view', compact('team'));
    }

    public function edit(Team $team)
    {
        $teams=Team::all();
        $clubs=Club::all();
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
            $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path(), $imageName);
            $team->logo = $imageName;
        }
    
        // Save the updated team data
        $team->save();
    
        return redirect()->route('admin.teams.search')->with('success', 'Team updated successfully!');
    }
    
    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->delete();
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
        $team->players()->sync($request->input('selected_players'));

        return redirect()->back()->with('success', 'Players added to the team successfully');
    }


    public function adclRedsPlayers()
    {
        // Assuming you have a pivot table named 'player_team' with 'team_id' and 'player_id' columns
        $teamId = 1; // Replace '1' with the actual ID of the "ADCL REDS" team

        // Retrieve players associated with the team and paginate the results
        $players = Player::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->orderBy('name')->paginate(16); // Adjust the number as needed

        return view('adclTeams.adclReds', compact('players', 'teamId'));
    }


    public function adclGreensPlayers()
    {
        // Assuming you have a pivot table named 'player_team' with 'team_id' and 'player_id' columns
        $teamId = 3; // Replace '3' with the actual ID of the "ADCL Greens" team

        // Retrieve players associated with the team
        $players = Player::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->orderBy('name')->paginate(16);;

        return view('adclTeams.adclGreens', compact('players', 'teamId'));
    }

    public function adclYellowsPlayers()
    {
        // Assuming you have a pivot table named 'player_team' with 'team_id' and 'player_id' columns
        $teamId = 4; // Replace '3' with the actual ID of the "ADCL Greens" team

        // Retrieve players associated with the team
        $players = Player::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->orderBy('name')->paginate(16);;

        return view('adclTeams.adclYellows', compact('players', 'teamId'));
    }

    public function adclBluesPlayers()
    {
        // Assuming you have a pivot table named 'player_team' with 'team_id' and 'player_id' columns
        $teamId = 2; // Replace '3' with the actual ID of the "ADCL Greens" team

        // Retrieve players associated with the team
        $players = Player::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->orderBy('name')->paginate(16);

        return view('adclTeams.adclBlues', compact('players', 'teamId'));
    }

    public function adclGreysPlayers()
    {
        // Assuming you have a pivot table named 'player_team' with 'team_id' and 'player_id' columns
        $teamId = 5; // Replace '3' with the actual ID of the "ADCL Greens" team

        // Retrieve players associated with the team
        $players = Player::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->orderBy('name')->paginate(16);

        return view('adclTeams.adclGreys', compact('players', 'teamId'));
    }

    public function adclBlacksPlayers()
    {
        // Assuming you have a pivot table named 'player_team' with 'team_id' and 'player_id' columns
        $teamId = 6; // Replace '6' with the actual ID of the "ADCL Blacks" team

        // Retrieve players associated with the team and order them by their first name
        $players = Player::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->orderBy('name')->paginate(16);

        return view('adclTeams.adclBlacks', compact('players', 'teamId'));
    }
}
