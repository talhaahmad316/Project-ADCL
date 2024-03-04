<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Rules\Password::defaults()],
            'role' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        return redirect('/admin/login')->with('success', 'User created successfully');
    }
}
