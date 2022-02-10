<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
             $data = DB::table('events')->select('title', 'start', 'textColor')->get();
            return response()->json($data);
        }

    return view('calendar');
    }
    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->textColor = $request->input('textColor');
        $event->save();

        return redirect('event');
    }
}


