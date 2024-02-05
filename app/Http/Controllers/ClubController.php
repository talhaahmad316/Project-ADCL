<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();
        return view('admin.club.search', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.club.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $club = new Club;
        $club->club_name = $request->club_name;
        $club->club_countary = $request->club_countary;
        $club->personal_club = $request->personal_club;
        $club->description = $request->description;
        $club->save();
        return redirect()->route('club-create')->with('success', 'Club created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $club = Club::all();
        $club = Club::find($id);
        return view('admin.club.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $club = Club::find($request->id);
        $club->club_name = $request->club_name;
        $club->club_countary = $request->club_countary;
        $club->personal_club = $request->personal_club;
        $club->description = $request->description;
        $club->save();
        return redirect()->route('club-search')->with('success', 'Club updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the club by ID
        $club = Club::find($id);

        // Check if the club exists
        if ($club) {
            // Delete the club
            $club->delete();

            // Redirect back with success message
            return redirect()->route('club-search')->with('success', 'Club deleted successfully');
        } else {
            // If the club doesn't exist, redirect back with an error message
            return redirect()->route('club-search')->with('error', 'Club not found');
        }
    }
}
