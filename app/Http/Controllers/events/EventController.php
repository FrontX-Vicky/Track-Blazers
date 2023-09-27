<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meets;
use App\Models\Events;
use App\Models\round;

class EventController extends Controller
{
  public function index()
  {
    $events = Events::simplePaginate(10);
    return view('content.events.manage-event',['data' => $events]);
  }
  // {
  //   $round = round()::simplePaginate(10);
  //   return view('content.events.rounds',['data' => $round]);
  // }

  public function createEvent($id = null)
  {
    $meets = Meets::all();
    $data['data']['meets'] = compact('meets');
    $data['data']['id'] = $id;
    return view('content.events.create-event',$data); 
  }

public function insertEvent(Request $req)
  {
    // dd($req->all());
    // $events_data = unserialize($req);
    $events = new Events;
    $events->event_id	 = $req['event_id'];
    $events->meet_id	 = $req['meet_id'];
    $events->name = $req['event_name'];
    $events->gender	 = $req['gender'];
    $events->event_type = $req['event_type'];
    $events->no_positions	= $req['no_positions'];
    $events->position_assigment	 = $req['position_assigment'];
    $events->flight_assigment = $req['flight_assigment'];
    $events->flight_order = $req['flight_order'];
    $events->advancement	 = $req['advancement'];
    $events->member_count = $req['members'];
    $events->scoring = isset($req['score_event']) ? $req['score_event']: '0';
    $events->entries_unit	 = $req['entries_unit'];
    $events->result_unit = $req['result_unit'];

    // $events->relay = isset($req['relay']) ? $req['relay']: '0';
    // $events->distance = $req['distance'];
    // $events->mode = $req["lane-assignment-wind"];
    // $events->start = $req["start-wind"];
    // $events->duration = $req["duration-wind"];
    $events->modified_by = "1";
    $events->created_at = date("Y-m-d h:i:s");
    $events->save();

    // echo $events->id;
    // if($events){

    // }
    $response = ['data' => '', "status" => 1, "msg" => 'Succcess!'];
    return $response;
  }
  public function insertRounds(Request $req)
  {
      $rounds_data = serialize($req);
      $rounds = new round;
      $rounds->event_id = $req['event-id'];
      $rounds->round_name = $req['roundName'];
      $rounds->date = $req['currentDate'];
      $rounds->time = $req['defaultTime'];
      $rounds->save();
  }




}
