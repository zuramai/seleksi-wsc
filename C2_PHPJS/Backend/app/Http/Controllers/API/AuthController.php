<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendee;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $att = Attendee::where('lastname', $request->lastname)->where('registration_code', $request->registration_code)->first();
        
        if(!$att) return response()->json(['message' => 'Invalid login'], 401);

        $att->login_token = Hash::make($att->username);
        $att->save();

        return response()->json([
            'firstname' => $att->firstname,
            'lastname' => $att->lastname,
            'username' => $att->username,
            'email' => $att->email,
            'token' => $att->login_token,
            ]);
    }

    public function logout(Request $request) {
        $attendee = Attendee::where('login_token', $request->get('token'))->first();
        if (!$attendee) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $attendee->login_token = null;
        $attendee->save();

        return ['message' => 'Logout success'];
    }
}
