<?php

namespace App\Http\Controllers\athlete;

use App\Http\Controllers\Controller;
use App\Models\Athletes;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
  public function index()
  {
    $athletes = Athletes::simplePaginate(10);
    // $data = compact('meets');
    return view('content.athlete.manage-athlete', ['data' => $athletes]);
    // return view('content.layouts-example.layouts-container');
  }

  public function createAthlete()
  {
    return view('content.athlete.create-athlete');
  }

  public function insertAthlete(Request $req)
  {

    // dd($req->all());
    $athlete = new Athletes;
    $athlete->athlete_id = $req['athlete_id'];
    $athlete->fname = $req['fname'];
    $athlete->lname	 = $req['lname'];
    $athlete->affiliation	 = $req['affiliation'];
    $athlete->gender = $req['gender'];
    $athlete->event_id = isset($req['scoring']) ? $req['scoring']: '0';
    $athlete->created_by = "48077";
    $athlete->created_at = date("Y-m-d h:i:s");
    $athlete->save();
    return redirect()->route('athletes');
  }
}
