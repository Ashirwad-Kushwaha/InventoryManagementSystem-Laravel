<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        //Validate
            $fields = $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required','max:255', 'email', 'unique:users'],
                'password' => ['required', 'min:6', 'confirmed']

            ]);

         //Register user

           $user = User::create($fields);

         //Login

            Auth::login($user);

         //Redirect

            return redirect()->route('home');
    }

    //Login function--------------------------------------------

    public function login(Request $request){

        //Validate
            $fields = $request->validate([
                'email' => ['required','max:255', 'email'],
                'password' => ['required']

            ]);

         //Attempt to login
            if(Auth::attempt($fields, $request->remember)){
                return redirect()->intended();
            }else{
                return back()->withErrors([
                    'failed' => 'The provided credentials do not match our records.',
                ]);
            }

    }

    //Logout function--------------------------------------------

    public function logout(Request $request){
        Auth::logout();

        //Invalidate user session
        $request->session()->invalidate();

        //Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

}
