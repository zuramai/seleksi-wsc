<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendee;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index(Request $request) {
        $token = $request->get('token');
        $attendee = Attendee::where('login_token', $token)->first();

        if (!$token || !$attendee) {
            return response()->json(['message' => 'User not logged in'], 401);
        }

        return [
            'registrations' => Registration::where('attendee_id', $attendee->id)->orderBy('id', 'asc')->with('ticket.event.organizer')->get()->map(function ($registration) {
                return [
                    'event' => $registration->ticket->event,
                    'session_ids' => $registration->sessions->pluck('id'),
                ];
            }),
        ];
    }
}
