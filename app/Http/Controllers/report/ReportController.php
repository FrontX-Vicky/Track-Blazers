<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Http\Controllers\pdf\PDFController;
use App\Models\Event_rounds_view;
use App\Models\Events_view;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function meetProgram(){
        $data = [];
        $event_rounds = [];
        if (isset(session()->all()['meet_id'])) {
          $event_rounds = Event_rounds_view::where('meet_id', '=', session()->all()['meet_id'])->get();(10);
        }

        $data['event_rounds'] = $event_rounds;

        return view('content.reports.print-meet-program', ['data' => $data]);
    }

    public function getMeetProgramReport(Request $res){
        $res = $res->toArray();
        $data = [];
        $data['header'] = [
           'date' => date('d-m-Y'),
           'time' => date('H:i:s')
        ];
        $event_rounds = [];
        if(isset($res['ids'])) {
            $event_rounds = Event_rounds_view::select('event_id')->whereIn('id', $res['ids'])->get()->toArray();

            foreach($event_rounds as $event){
               $event_ids[] = $event['event_id'];
            }

            $events = Events_view::whereIn('id', $event_ids)->get()->toArray();

            foreach($events as $event){
               $data['events'][] = $event;
            }
            $PDF = new PDFController();

            return $PDF->generatePDF($data);
            // $data['event_rounds'] = $event_rounds;
        }
        // return view('content.reports.print-meet-program', ['data' => $data]);
    }
}
