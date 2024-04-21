<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function create(){
        User::create([
            'name' => "gerant",
            'email' => "gerant@gerant.com",
            'password' => Hash::make("gerant1234")
        ]);
        echo "Registration successfull";
    }

    public function doLogin (Request $request) { 
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:4' ]);

        $credentials = ['email'=>$request->input('email'), 'password' => $request->input('password')];
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('gerant');
        }
        // si on arrive ici ca veut dire qu' il ne s'est pas connecte' donc on le redirige quelques part return to_route('auth.login')->withErrors([
        return to_route('auth.login')->withErrors(['email' => "Invalid email"
        ])->onlyInput('email'); 
    }

    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }
}
