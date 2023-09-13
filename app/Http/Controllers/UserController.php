<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Allows a user to log in
    public function authenticate(Request $request)
    {   
        csrf_token();
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("");
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }

    //Logs out the current current logged in user
    public function logout() {
        Auth::logout();

        return redirect()->intended("");        
    }

    //Add a new user to the database
    public function register(Request $request) {

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->wallet = 5;

        $user->save();

        return back()->with('success', 'Registeration successfull');
        
    }
}
