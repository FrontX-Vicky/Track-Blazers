<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meets;

class EventController extends Controller
{
  public function index()
  {
    return view('content.events.create-event');
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
    dd($req->all());

    // return view('content.meet.createmeet');
    // $meets = new Meets;
    // $meets->name = $req['name'];
    // $meets->location = $req['location'];
    // $meets->from_date	 = $req['from_date'];
    // $meets->to_date = $req['to_date'];
    // $meets->scoring = isset($req['scoring']) ? $req['scoring']: '0';
    // $meets->created_by = "48077";
    // $meets->created_at = date("Y-m-d h:i:s");
    // $meets->save();
  }





}
