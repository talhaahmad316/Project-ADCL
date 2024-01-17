<?php

// app/Http/Controllers/Admin/PlayerController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    // Method to show the add player form
    public function create()
    {
        return view('admin.players.create');
    }

    // Method to store the player data in the database
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'nationality' => 'required|string',
        ]);

        // Upload the player picture and store the data in the database
        $data = $request->all();
        if ($request->hasFile('Picture')) {
            $imagePath = $request->file('Picture')->store('player_images', 'public');
            $data['picture'] = $imagePath;
        }

        // Save the player data in the database
        Player::create($data);

        // Redirect back to the add player form with a success message
        return redirect()->route('players.create')->with('success', 'Player added successfully!');
    }

    // Method to show the search page for players

public function search(Request $request)
{
    $search = $request->input('search');


    // Query the players and paginate the results
    $players = Player::where('name', 'LIKE', "%$search%")
                      ->orWhere('nationality', 'LIKE', "%$search%")
                      ->paginate(15); // You can adjust the number of items per page

    return view('admin.players.search', compact('players'));
}

    // Method to show the view page for a player
    public function view(Player $player)
    {

        return view('admin.players.view', compact('player'));
    }

    // Method to show the edit page for a player
    public function edit(Player $player)
    {
        return view('admin.players.edit', compact('player'));
    }

    // Method to update the player data in the database
    public function update(Request $request, Player $player)
    {
        // Validate the form data (you can customize the validation rules as per your requirements)
        $request->validate([
            'name' => 'required|string',
            'Picture' => 'image|mimes:jpeg,png,jpg,gif,webp',
            'nationality' => 'required|string',
            'status' => 'required|in:active,inactive',
            'description' => 'required|string',
        ]);

        // Update the player picture if a new image is provided
        if ($request->hasFile('Picture')) {
            $imagePath = $request->file('Picture')->store('player_images', 'public');
            $player->picture = $imagePath;
        }

        // Update other player data
        $player->name = $request->input('name');
        $player->nationality = $request->input('nationality');
        $player->status = $request->input('status');
        $player->description = $request->input('description');

        $player->save();

        // Redirect back to the edit player page with a success message
        return redirect()->route('players.edit', ['player' => $player->id])->with('success', 'Player updated successfully!');
    }

    // Method to delete a player
    public function destroy(Player $player)
    {
        // Delete the player record
        $player->delete();

        // Redirect back to the search page with a success message
        return redirect()->route('players.search')->with('success', 'Player deleted successfully!');
    }



    public function showAllPlayers()
    {
        $players = Player::orderBy('name')->paginate(16); // Adjust the number per page as needed

        return view('ADCL.adclAll', compact('players'));
    }



}

