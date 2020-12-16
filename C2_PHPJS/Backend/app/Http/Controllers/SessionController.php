<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Room;
use App\Models\Event;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {   
        return view('sessions.create', ['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room' => 'required',
            'cost' => 'nullable',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);
        
        $session = new Session;
        $session->start = $request->start;
        $session->end = $request->end;
        $session->description = $request->description;
        $session->type = $request->type;
        $session->title = $request->title;
        $session->speaker = $request->speaker;
        $session->room_id = $request->room;
        $session->cost = $request->cost;
        $session->save();
        
        session()->flash('success','Session successfully created');

        return redirect()->route('events.show', ['event' => $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Event $event, Session $session)
    {
        return view('sessions.edit', ['session' => $session, 'event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Event $event, Session $session)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room' => 'required',
            'cost' => 'nullable',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);
        
        $session->start = $request->start;
        $session->end = $request->end;
        $session->description = $request->description;
        $session->type = $request->type;
        $session->title = $request->title;
        $session->speaker = $request->speaker;
        $session->room_id = $request->room;
        $session->cost = $request->cost;
        $session->save();
        
        session()->flash('success','Session successfully updated');

        return redirect()->route('events.show', ['event' => $event->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
