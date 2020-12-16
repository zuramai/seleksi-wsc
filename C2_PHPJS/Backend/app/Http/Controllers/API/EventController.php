<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organizer;

class EventController extends Controller
{
    public function index() {
        $events = Event::with('organizer')->where('date', '<', date('Y-m-d'))->get();
        return response()->json(['events' => $events]);
    }   
    public function show(Request $request, $organizer_slug, $event_slug) {
        $organizer = Organizer::where('slug',$organizer_slug)->first();
        if(!$organizer) return response()->json(['message' => 'Organizer not found'], 404);


        $event = Event::with('channels','channels.rooms.sessions','channels.rooms.sessions','tickets')->where('slug', $event_slug)->where('organizer_id', $organizer->id)->first();
        if(!$event) return response()->json(['message' => 'Event not found'], 404);

        return response()->json($event);
    }
}
