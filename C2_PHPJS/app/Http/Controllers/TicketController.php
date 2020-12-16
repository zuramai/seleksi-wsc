<?php

namespace App\Http\Controllers;

use App\Models\EventTicket;
use App\Models\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        return view('tickets.create', compact('event'));
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
            'name' => 'required',
            'cost' => 'required',
            'special_validity' => 'required',
        ]);
        
        $valids = [];
        if($request->special_validity == 'amount') $request->validate(['amount' => 'required']);
        else if($request->special_validity == 'date') $request->validate(['date' => 'required']);
            

        array_push($valids, [
            "type" => $request->special_validity,
            $request->special_validity => ($request->special_validity == 'amount' ? $request->amount : $request->date)
        ]);

        $ticket = new EventTicket;
        $ticket->event_id = $event->id;
        $ticket->name = $request->name;
        $ticket->cost = $request->cost;
        $ticket->special_validity = json_encode($valids);
        $ticket->save();

        return redirect()->route('events.show', ['event' => $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(EventTicket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(EventTicket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventTicket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventTicket $ticket)
    {
        //
    }
}
