<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
        return view("user.login");
    }

    public function authenticate(Request $request) {
        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);

        if(Auth::attempt(["email"=> $request->email,"password"=> $request->password])) {
            return redirect()->route("products.index")->withSuccess("Welcome back, " . Auth::user()->email);
        }

        return redirect()->back()->withErrors([
            "email"=> "Invalid email or password."
        ])->withInput();
    }

    public function register() {
        return view("user.register");
    }

    public function store(Request $request) {
        $request->validate([
            "email"=> "required|email",
            "password"=> "required",
            "v-password"=> "required|confirmed:password"
        ]);
        if(User::where("email", $request->email)->exists()) {
            return redirect()->back()->withErrors([
                "email"=> "Email already exists. Please login or use a different email."
            ])->onlyInput();
        }


        $user = new User();

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route("login")->withSuccess("User registered successfully. Please login.");
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login")->withSuccess("You have been logged out successfully.");
    }
}
