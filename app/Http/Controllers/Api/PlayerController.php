<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Club;
use Validator;

class PlayerController extends Controller
{
    public function search(Request $request)
    {
        $players = Player::get();
        return response()->json($players);
    }

    public function store(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            // 'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'nationality' => 'required|string',
            'club_name' => 'required|string',
        ]);
        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();
            return response()->json($responseArr, 401);
        }
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

        $player = Player::create($data);
        return response()->json(['success' => 'Player added successfully!', 'player' => $player], 201);
    }

    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            // 'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            // 'nationality' => 'required|string',
            // 'club_name' => 'required|string',
        ]);

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

        return response()->json(['success' => 'Player details updated successfully!', 'player' => $player]);
    }
}

