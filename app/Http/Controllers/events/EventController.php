<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use App\Models\Advancement;
use App\Models\Distance_master;
use App\Models\Event_type;
use Illuminate\Http\Request;
use App\Models\Meets;
use App\Models\Events;
use App\Models\Events_view;
use App\Models\Flight_order;
use App\Models\Gender;
use App\Models\Measurement_system;
use App\Models\Position_assignment;
use App\Models\Rounds;
use Illuminate\Console\Scheduling\Event;

class EventController extends Controller
{
  public function index()
  {

    //   $events = Events::select([
    //     'events.id as id',
    //     'events.event_id as event_id',
    //     'events.meet_id as meet_id',
    //     'meets.name as meet',
    //     'events.name as name',
    //     'gender.gender as gender',
    //     'events.event_type as event_type_id',
    //     'event_types.name as event_type',
    //     'events.no_positions as no_positions',
    //     'events.relay as relay',
    //     'events.distance as distance',
    //     'events.scoring as scoring',
    //     'events.member_count as member_count',
    //     'events.entries_unit as entries_unit',
    //     'events.result_unit as result_unit',
    //     'events.lane_count as lane_count',
    //     'events.position_assignment as position_assignment_id',
    //     'position_assignments.orders as position_assignment',
    //     'events.flight_assignment as flight_assignment_id',
    //     'flight_assignments.assignment as flight_assignment',
    //     'events.flight_order as flight_order_id',
    //     'flight_orders.orders as flight_order',
    //     'events.advancement as advancement_id',
    //     'advancement.advancement as advancement',
    //     'events.mode as mode',
    //     'events.start as start',
    //     'events.duration as duration',
    //     'events.modified_by as modified_by',
    //     'events.created_at as created_at',
    //     'events.updated_at as updated_at',
    // ])
    // ->leftJoin('advancement', 'advancement.id', '=', 'events.advancement')
    // ->leftJoin('event_types', 'event_types.id', '=', 'events.event_type')
    // ->leftJoin('flight_orders', 'flight_orders.id', '=', 'events.flight_order')
    // ->leftJoin('meets', 'meets.id', '=', 'events.meet_id')
    // ->leftJoin('gender', 'gender.id', '=', 'events.gender')
    // ->leftJoin('position_assignments', 'position_assignments.id', '=', 'events.position_assignment')
    // ->leftJoin('flight_assignments', 'flight_assignments.id', '=', 'events.flight_assignment')
    // ->simplePaginate(5);


    // $events = Events_view::where('meet_id' , '=', session()->all()['meet_id'])->simplePaginate(10);

    if (isset(session()->all()['meet_id'])) {
      $events = Events_view::where('meet_id', '=', session()->all()['meet_id'])->where('park', '=', '0')->simplePaginate(10);
    } else {
      $events = Events_view::where('park', '=', '0')->simplePaginate(10);
    }
    return view('content.events.manage-event', ['data' => $events]);
  }
  // {
  //   $round = round()::simplePaginate(10);
  //   return view('content.events.rounds',['data' => $round]);
  // }

  public function createEvent($id = null)
  {
    $meets = Meets::all();
    $advancement = Advancement::all();
    $distance_master = Distance_master::all();
    $event_type = Event_type::all();
    $flight_orders = Flight_order::all();
    $gender = Gender::all();
    $measurement_system = Measurement_system::all();
    $position_assignment = Position_assignment::all()->where('hide', '=', '0');
    $events = Events::select('event_id')->where('meet_id', '=', $id)->where('park', '=', '0')->orderBy('event_id', 'asc')->get()->toArray();

    $event_id = 0;

    for($i = 0; $i <= (count($events)); $i++){
      $event_id++;
      if(isset($events[$i])){
        if($events[$i]['event_id'] != ($event_id)){
          break;
        }
      }
    }

    // echo "<pre>";
    // print_r($event_id);exit;

    $data['data'] = compact('meets', 'advancement', 'distance_master', 'event_type', 'flight_orders', 'gender', 'measurement_system', 'position_assignment');
    $data['data']['meet_id'] = $id;
    $data['data']['event_id'] = $event_id;
    return view('content.events.event-create', $data);
  }


  public function editEvent($id = null)
  {
    $meets = Meets::all();
    $event = Events::find($id);
    $advancement = Advancement::all();
    $distance_master = Distance_master::all();
    $event_type = Event_type::all();
    $flight_orders = Flight_order::all();
    $gender = Gender::all();
    $measurement_system = Measurement_system::all();
    $position_assignment = Position_assignment::all()->where('hide', '=', '0');
    $rounds = Rounds::where('event_row_id', '=', $id)->get()->toArray();
    $data['data'] = compact('event','meets','rounds','advancement', 'distance_master', 'event_type', 'flight_orders', 'gender', 'measurement_system', 'position_assignment');
    $data['data']['event_id'] = $id;
    return view('content.events.event-edit', $data);
  }

  public function insertEvent(Request $req)
  {
    // dd($req->all());
    // $events_data = unserialize($req);
    $events = new Events;
    $events->event_id   = $req['event_id'];
    $events->meet_id   = $req['meet_id'];
    $events->name = $req['event_name'];
    $events->gender   = $req['gender'];
    $events->event_type = $req['event_type'];
    $events->no_positions  = $req['no_positions'];
    $events->position_assignment   = $req['position_assignment'];
    $events->flight_assignment = $req['flight_assignment'];
    $events->flight_order = $req['flight_order'];
    $events->advancement   = $req['advancement'];
    $events->member_count = $req['members'];
    $events->scoring = isset($req['score_event']) ? $req['score_event'] : '0';
    $events->entries_unit   = $req['entries_unit'];
    $events->result_unit = $req['result_unit'];

    // $events->relay = isset($req['relay']) ? $req['relay']: '0';
    // $events->distance = $req['distance'];
    // $events->mode = $req["lane-assignment-wind"];
    // $events->start = $req["start-wind"];
    // $events->duration = $req["duration-wind"];

    $events->modified_by = "1";
    $events->created_at = date("Y-m-d h:i:s");
    $events->save();

    foreach ($req['round_id'] as $key => $val) {
      $event_id = $events->id;
      $round_no = $val;
      $round_name =  $req['round_name'][$key];
      $round_date =  $req['round_date'][$key];
      $round_time =  $req['round_time'][$key];
      $this->insertRound($event_id, $round_no, $round_name, $round_date, $round_time);
    }

    // echo $events->id;
    // if($events){

    // }
    $response = ['data' => ['meet_id' => $req['meet_id']], "status" => 1, "msg" => 'Succcess!'];
    return $response;
  }

  public function updateEvent(Request $req)
  {
    // dd($req->all());
    // $events_data = unserialize($req);
    $event = Events::find($req['event_row_id']);
    $event->event_id   = $req['event_id'];
    $event->meet_id   = $req['meet_id'];
    $event->name = $req['event_name'];
    $event->gender   = $req['gender'];
    $event->event_type = $req['event_type'];
    $event->no_positions  = $req['no_positions'];
    $event->position_assignment   = $req['position_assignment'];
    $event->flight_assignment = $req['flight_assignment'];
    $event->flight_order = $req['flight_order'];
    $event->advancement   = $req['advancement'];
    $event->member_count = $req['members'];
    $event->scoring = isset($req['score_event']) ? $req['score_event'] : '0';
    $event->entries_unit   = $req['entries_unit'];
    $event->result_unit = $req['result_unit'];

    // $events->relay = isset($req['relay']) ? $req['relay']: '0';
    // $events->distance = $req['distance'];
    // $events->mode = $req["lane-assignment-wind"];
    // $events->start = $req["start-wind"];
    // $events->duration = $req["duration-wind"];

    $event->modified_by = "1";
    $event->created_at = date("Y-m-d h:i:s");
    $event->save();
    Rounds::where('event_row_id', '=', $req['event_row_id'])->delete();
    foreach ($req['round_id'] as $key => $val) {
      $event_id = $event->id;
      $round_no = $val;
      $round_name =  $req['round_name'][$key];
      $round_date =  $req['round_date'][$key];
      $round_time =  $req['round_time'][$key];
      $this->insertRound($event_id, $round_no, $round_name, $round_date, $round_time);
    }

    $response = ['data' => '', "status" => 1, "msg" => 'Succcess!'];
    return $response;
  }

  public function deleteEvent($id = null){
    if($id != null){
      $event = Events::where('id', $id)
      ->update(['park' => '1']);
    }
    return $this->index();
  }

  public function insertRound($event_id, $round_no, $round_name, $round_date, $round_time)
  {
    $rounds = new Rounds();
    $rounds->event_row_id = $event_id;
    $rounds->round_no = $round_no;
    $rounds->name = $round_name;
    $rounds->date = $round_date;
    $rounds->time = $round_time;
    $rounds->save();
  }
}
