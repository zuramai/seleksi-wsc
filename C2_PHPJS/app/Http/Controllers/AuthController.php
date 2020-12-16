<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organizer;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $auth = Auth::attempt($request->except('_token'));
        if($auth) {
            return redirect('/');
        }
        return redirect()->back()->withErrors(['error' => 'Email or password not correct']);
    }

    public function logout() {

    }
}
