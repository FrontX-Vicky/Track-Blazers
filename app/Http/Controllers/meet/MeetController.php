<?php

namespace App\Http\Controllers\meet;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Meets;

class MeetController extends Controller
{
  public function index()
  {
    $meets = Meets::simplePaginate(10);
    // $data = compact('meets');
    return view('content.meet.manage-meets', ['data' => $meets]);
  }

  public function createMeet()
  {
    return view('content.meet.createmeet');
  }

  public function insertMeet(Request $req)
  {
    // dd($req->all());

    // return view('content.meet.createmeet');
    $meets = new Meets;
    $meets->name = $req['name'];
    $meets->location = $req['location'];
    $meets->from_date	 = $req['from_date'];
    $meets->to_date = $req['to_date'];
    $meets->scoring = isset($req['scoring']) ? $req['scoring']: '0';
    $meets->created_by = "48077";
    $meets->created_at = date("Y-m-d h:i:s");
    $meets->save();
    return redirect()->route('meets');
  }


  public function getMeet()
  {

    // return($meets);
    // return view('content.layouts-example.layouts-container');
  }


}
