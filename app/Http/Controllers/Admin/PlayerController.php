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
        $clubs=Club::all();
        return view('admin.players.create', get_defined_vars());
    }

    // Method to store the player data in the database
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
        
            // Move the uploaded image to the main public directory
            $request->file('Picture')->move(public_path(), $imageName);
        
            // Save the image path to the database
            $data['picture'] = $imageName;
        }
        

        if ($request->has('club_name')) {
            $clubName = $request->input('club_name');
            $data['club_name'] = $clubName;
        }
    
        Player::create($data);
    
        // Redirect back to the add player form with a success message
        return redirect()->route('players.search')->with('success', 'Player added successfully!');
    }
    
    



    // Method to show the search page for players

    public function search(Request $request)
    {
        $players = Player::all();
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
                 $data['picture'] = $imagePath;
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
