<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ReportController extends Controller
{
    public function index(Request $request, Event $event) {
        $sessions = $event->sessions;
        
        return view('reports.index', compact('event'));
    }
}
