<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function dashboard()
    {
        // $data = [
        //     'title' => 'Dashboard'
        // ];
        $users = User::all();
        return view('admin.dashboard', get_defined_vars());
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'You have been successfully logged out');
    }


    public function users()
    {
        $users = User::all();
        return view('users', get_defined_vars());
    }

    public function edit($id)
    {
        $users = User::all();
        $users = User::find($id);
        return view('auth.register-edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => Rules\Password::defaults(),
            'role' => 'required'
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();
        return Redirect::route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Find the club by ID
        $user = User::find($id);

        // Check if the club exists
        if ($user) {
            // Delete the club
            $user->delete();

            // Redirect back with success message
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } else {
            // If the club doesn't exist, redirect back with an error message
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
    }
}
