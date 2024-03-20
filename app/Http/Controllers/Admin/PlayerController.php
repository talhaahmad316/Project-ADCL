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
        
    
        // Retrieve the player record to update

        $player = Player::findOrFail($id);
        // Extract the data from the request, excluding CSRF token and Picture
        $data = $request->except('_token', '_method', 'Picture');
    
        // Check if a new Picture is uploaded
        if ($request->hasFile('Picture')) {
            $imageName = time() . '.' . $request->file('Picture')->getClientOriginalExtension();
    
            // Move the uploaded image to the main public directory
            $request->file('Picture')->move(public_path(), $imageName);
    
            // Update the picture path in the data array
            $data['picture'] = $imageName;
        }
        // Update the player record with the new data
        $player->update($data);
    
        // Redirect back to the page with a success message
        return redirect()->route('players.search', ['player' => $id])->with('success', 'Player details updated successfully!');
    }


    public function showAllPlayers()
    {
        $players = Player::orderBy('name')->paginate(16); // Adjust the number per page as needed

        return view('ADCL.adclAll', compact('players'));
    }
}
