<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meets;
use App\Models\Events;

class EventController extends Controller
{
  public function index()
  {
    $events = Events::simplePaginate(10);
    return view('content.events.manage-event',['data' => $events]);
  }

  public function createEvent($id = null)
  {
    $meets = Meets::all();
    $data['data']['meets'] = compact('meets');
    $data['data']['id'] = $id;
    return view('content.events.create-event',$data);
  }

  public function insertEvent(Request $req)
  {
    dd($req);
    // $events_data = unserialize($req);
    print_r($events_data);exit;
    // return view('content.meet.createmeet');
    $events = new Events;
    $events->event_id	 = $req['event-id'];
    $events->event_name = $req['event-name'];
    $events->gender	 = $req['gender'];
    $events->event_type = $req['event-type'];
    $events->relay = isset($req['relay']) ? $req['relay']: '0';
    $events->distance = $req['distance'];
    $events->member_count = $req['members'];
    $events->entries	 = $req['entries'];
    $events->result = $req['results'];
    $events->lane_count	= $req['no-Positions'];
    $events->position_assigment	 = $req['lane-assignment'];
    $events->flight_assigment = $req['heat-assignment'];
    $events->flight_order = $req['heat-order'];
    $events->advancement	 = $req['advancement'];
    $events->scoring = isset($req['score-event']) ? $req['score-event']: '0';
    $events->mode = $req["lane-assignment-wind"];
    $events->start = $req["start-wind"];
    $events->duration = $req["duration-wind"];
    $events->modified_by = "1";
    
    // $events->to_date = $req['lane-assignment-wind'];
    // $events->to_date = $req['start-wind'];
    // $events->to_date = $req['duration-wind'];
    // $events->to_date = $req['event-type'];
    // $events->to_date = $req['total-laps'];
    // $events->to_date = $req['laps-per-split'];
    // $events->to_date = $req['too-fast-time'];
    // $events->to_date = $req['too-slow-time']; 
    $events->created_at = date("Y-m-d h:i:s");
    $events->save();
  }





}
