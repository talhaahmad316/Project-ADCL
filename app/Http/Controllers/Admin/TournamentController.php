<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function create()
    {
        return view('admin.tournaments.addTournament');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'tournamentname' => 'required|string',
            'tournamentLocation' => 'required|string',
            'tournamentStartTime' => 'required|date',
            'tournamentEndTime' => 'required|date|after:tournamentStartTime',
            'tournamentCountry' => 'required|string',
            'tournamentStatus' => 'required|in:active,inactive',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
        ]);

        // Handle file upload (logo image)
        if ($request->hasFile('banner_image')) {
            $imagePath = $request->file('banner_image')->store('tournament_images', 'public');
        }

        Tournament::create([
            'tournamentname' => $validatedData['tournamentname'],
            'tournamentLocation' => $validatedData['tournamentLocation'],
            'tournamentStartTime' => $validatedData['tournamentStartTime'],
            'tournamentEndTime' => $validatedData['tournamentEndTime'],
            'tournamentCountry' => $validatedData['tournamentCountry'],
            'tournamentStatus' => $validatedData['tournamentStatus'],
            'banner_image' => $imagePath,
        ]);
        return redirect()->route('admin.tournaments.create')->with('success', 'Tournament added successfully.');
    }
    
}
