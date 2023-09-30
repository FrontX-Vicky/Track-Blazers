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

    if(isset(session()->all()['meet_id'])){
       $events = Events_view::where('meet_id' , '=', session()->all()['meet_id'])->simplePaginate(10);
    }else{
       $events = Events_view::simplePaginate(10);
    }
    return view('content.events.manage-event',['data' => $events]);
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

    $data['data'] = compact('meets' , 'advancement', 'distance_master', 'event_type', 'flight_orders', 'gender', 'measurement_system', 'position_assignment');
    $data['data']['meet_id'] = $id;
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
    $events->position_assignment	 = $req['position_assignment'];
    $events->flight_assignment = $req['flight_assignment'];
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

    foreach($req['round_id'] as $key => $val){
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
    $response = ['data' => '', "status" => 1, "msg" => 'Succcess!'];
    return $response;
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
