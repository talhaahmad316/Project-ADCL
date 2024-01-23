<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

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


    public function datatable()
    {
        return view('dashboard', get_defined_vars());
    }
}
