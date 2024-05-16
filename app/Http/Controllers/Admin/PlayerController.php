<?php

// app/Http/Controllers/Admin/PlayerController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Club;

class PlayerController extends Controller
{
    // Method to show the add player form
    public function create()
    {
        $clubs = Club::all();
        return view('admin.players.create', get_defined_vars());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'nationality' => 'required|string',
            'club_name' => 'required|string',
        ]);
        $data = $request->except('_token', 'Picture');
        if ($request->hasFile('Picture')) {
            $imageName = time() . '.' . $request->file('Picture')->getClientOriginalExtension();
            $request->file('Picture')->move(public_path(), $imageName);
            $data['picture'] = $imageName;
        }
        if ($request->has('club_name')) {
            $clubName = $request->input('club_name');
            $data['club_name'] = $clubName;
        }
        Player::create($data);
        return redirect()->route('players.search')->with('success', 'Player added successfully!');
    }
    // Method to show the search page for players
    public function search(Request $request)
    {
        $players = Player::all();
        return view('admin.players.search', compact('players'));
        // return json_encode($players);
    }
    // Method to show the view page for a player
    public function view(Player $player)
    {
        return view('admin.players.view', compact('player'));
    }
    // Method to show the edit page for a player
    public function edit($id)
    {
        $clubs = Club::all();
        $player = Player::find($id);
        $countries = Player::distinct()->pluck('nationality')->toArray();
        return view('admin.players.edit', compact('clubs', 'player', 'countries'));
    }
    // Method to update the player data in the database
    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $data = $request->except('_token', '_method', 'Picture');
        if ($request->hasFile('Picture')) {
            $oldImagePath = public_path($player->picture);
            $imageName = time() . '.' . $request->file('Picture')->getClientOriginalExtension();
            $request->file('Picture')->move(public_path(), $imageName);
            $data['picture'] = $imageName;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $player->update($data);
        return redirect()->route('players.search', ['player' => $id])->with('success', 'Player details updated successfully!');
    }
    public function showAllPlayers()
    {
        $players = Player::orderBy('name')->paginate(10);
        return view('ADCL.adclAll', compact('players'));
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        if ($player) {
            $oldImagePath = public_path($player->picture);
            $player->delete();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            return redirect()->route('players.search')->with('success', 'player deleted successfully');
        } else {
            return redirect()->route('players.search')->with('error', 'player not found');
        }
    }
}
