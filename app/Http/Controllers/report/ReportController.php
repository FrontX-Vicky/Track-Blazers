<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Http\Controllers\pdf\PDFController;
use App\Models\Athletes_view;
use App\Models\Event_rounds_view;
use App\Models\Events_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('content.reports.print-report-meet-program', ['data' => $data]);
    }

    public function getMeetProgramReport(Request $res){
        $res = $res->toArray();
        $data = [];
        $data['header'] = [
           'date' => date('d-m-Y'),
           'time' => date('H:i:s')
        ];
        DB::enableQueryLog();
        $event_rounds = [];
        if(isset($res['ids'])) {
            $event_rounds = Event_rounds_view::select('event_id', 'round_no')->whereIn('id', $res['ids'])->get()->toArray();

            foreach($event_rounds as $event){
               $event_ids[] = $event['event_id'];
               $round_nos[] = $event['round_no'];
            }

            $athletes = Athletes_view::whereIn('event_id', $event_ids)->whereIn('round_no', $round_nos)->get()->toArray();
            foreach($athletes as $athlete){
               $data['events_rounds'][$athlete['event_name']][$athlete['round_name']][$athlete['round_date'].' '.$athlete['round_time']][] = $athlete;
            }

            // print_r($data);exit;
            $PDF = new PDFController();

            return $PDF->generatePDF($data);
            // $data['event_rounds'] = $event_rounds;
        }
        // return view('content.reports.print-report-meet-program', ['data' => $data]);
    }
}
