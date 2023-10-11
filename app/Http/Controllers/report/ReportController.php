<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Event_rounds_view;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function meetProgram(){
        $data = [];
        $event_rounds = Event_rounds_view::where('meet_id', '=', session()->all()['meet_id'])->get();
        $data['event_rounds'] = $event_rounds;

        return view('content.reports.print-meet-program', ['data' => $data]);
    }
}
