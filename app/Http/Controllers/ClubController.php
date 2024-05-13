<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;

use App\Models\Club;
use App\Models\Team;
use App\Models\MyClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $clubs = Club::all();
        $clubs = Club::with('parentClub')->get();
        $myclub = MyClub::all();
        return view('admin.club.search', get_defined_vars());
    }
    public function teamDestroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->delete();
            return redirect()->route('admin.teams.search')->with('success', 'Team deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Cannot delete team. It is referenced in other records.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $myclub = MyClub::all();
        $clubs = Club::pluck('club_name', 'id');
        return view('admin.club.create', compact('clubs'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'club_name' => 'required',
            'parent_club' => 'required',
            'country' => 'required',
            'description' => 'required',
            'club_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $club = new Club;
        $club->club_name = $request->club_name;
        $club->parent_club = $request->parent_club;
        $club->country = $request->country;
        $club->description = $request->description;
        if ($request->hasFile('club_logo')) {
            $imageName = time() . '.' . $request->file('club_logo')->getClientOriginalExtension();
            $request->file('club_logo')->move(public_path(), $imageName);
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
        // $club = Club::all();
        // $myclubs = MyClub::all();
        $club = Club::find($id);
        $clubs = Club::pluck('club_name', 'id');
        return view('admin.club.edit', get_defined_vars());
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            'club_name' => 'required',
            'parent_club' => 'required',
            'country' => 'required',
            'description' => 'required',
            'club_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $club = Club::find($request->id);
        if ($request->hasFile('club_logo')) {
            if ($club->club_logo) {
                $existingImagePath = public_path($club->club_logo);
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
            }
            $imageName = time() . '.' . $request->file('club_logo')->getClientOriginalExtension();
            $request->file('club_logo')->move(public_path(), $imageName);
            $club->club_logo = $imageName;
        }
        $club->club_name = $request->club_name;
        $club->parent_club = $request->parent_club;
        $club->country = $request->country;
        $club->description = $request->description;
        $club->save();
        return redirect()->route('club-search')->with('success', 'Club updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $club = Club::find($id);
        if ($club) {
            $club->delete();
            return redirect()->route('club-search')->with('success', 'Club deleted successfully');
        } else {
            return redirect()->route('club-search')->with('error', 'Club not found');
        }
    }
}