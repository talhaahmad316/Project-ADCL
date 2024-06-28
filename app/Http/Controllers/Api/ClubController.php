<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\File;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('parentClub')->get();
        return response()->json($clubs);

    }
    /**
     * Store a newly created Club in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'club_name' => 'required',
            'parent_club' => 'required',
            'country' => 'required',
            'description' => 'required',
            // 'club_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        return response()->json(['success' => 'Club added successfully!', 'player' => $club], 201);

    }
    public function update(Request $request, Club $club)
    {
        $validator = \Validator::make($request->all(), [
            'club_name' => 'required',
            'parent_club' => 'required',
            'country' => 'required',
            'description' => 'required',
            // 'club_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        return response()->json(['success' => 'Club Updated successfully!', 'player' => $club], 201);
    }
}
