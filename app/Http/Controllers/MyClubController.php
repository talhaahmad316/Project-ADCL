<?php

namespace App\Http\Controllers;

use App\Models\MyClub;
use Illuminate\Http\Request;

class MyClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $myclub = new MyClub;
        $myclub->my_club = $request->my_club;
        $myclub->save();
        return back()->with('success', 'Club created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MyClub $myClub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyClub $myClub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyClub $myClub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyClub $myClub)
    {
        //
    }
}
