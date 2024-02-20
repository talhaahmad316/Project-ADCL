<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\MyClub;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();
        $myclub = MyClub::all();
        return view('admin.club.search', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $myclub = MyClub::all();

        return view('admin.club.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $club = new Club;
        $club->club_name = $request->club_name;
        $club->parent_club = $request->parent_club;
        $club->country = $request->country;
        $club->description = $request->description;
        // if ($request->hasFile('club_logo')) {
        //     $imagePath = $request->file('club_logo')->store('club_logos', 'public');
        //     // Save the image path to the database
        //     $club->club_logo = $imagePath;
        if ($request->hasFile('club_logo')) {
            $imageName = time() . '.' . $request->file('club_logo')->getClientOriginalExtension();

            // Move the uploaded image to the main public directory
            $request->file('club_logo')->move(public_path(), $imageName);

            // Save the image path to the database
            $club->club_logo = $imageName;
        }

        $club->save();
        return redirect()->route('club-search')->with('success', 'Club created successfully');
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
        $club->parent_club = $request->parent_club;
        $club->country = $request->country;
        $club->description = $request->description;
        if ($request->hasFile('club_logo')) {
            $imagePath = $request->file('club_logo')->store('club_logos', 'public');
            // Save the new image path to the database
            $club->club_logo = $imagePath;
        }
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
