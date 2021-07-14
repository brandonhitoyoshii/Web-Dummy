<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    
    // Get Register's View
    public function getRegister() {
        return view('/register');
    }

    // Post Register to Create User
    public function postRegister(Request $request) {

        // Validation
        $validated_data = $request->validate([
            'name' => ['required', 'min:6'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'alpha_num', 'min:8'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        // Create User in the Database
        $validated_data['password'] = bcrypt($validated_data['password']);
        unset($validated_data['password_confirmation']);
        $user = User::create($validated_data);
        
        // Redirect Guest to Home Page
        Auth::loginUsingId($user->id);
        return redirect()->route('home');

    }

    // Get Login's View
    public function getLogin() {
        return view('login');
    }

    // Post Login to Authenticate User
    public function postLogin(Request $request) {

        // Inputs from View
        $credentials = $request->only(['email', 'password']);

        // Attempt to Login and Send Error if fails
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['error' => 'Invalid email or password.']);
        }

        // Redirect Authenticated User to Home
        return redirect()->route('home');

    }

    // Post Logout to End the User's Session
    public function postLogout() {

        // Logout and Redirect User to Home
        Auth::logout();
        return redirect()->route('home');
    }

}
