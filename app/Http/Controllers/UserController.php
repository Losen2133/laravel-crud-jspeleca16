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
            return redirect()->route("products.index");
        }

        return redirect()->back();
    }

    public function register() {
        return view("user.register");
    }

    public function store(Request $request) {
        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);

        $user = new User();

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route("login");
    }

    public function logout() {

    }
}
