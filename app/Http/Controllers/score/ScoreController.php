<?php

namespace App\Http\Controllers\score;

use App\Http\Controllers\Controller;
use App\Models\Athletes;
use App\Models\Scoresheet;
use App\Models\Scoretable;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
  public function index()
  {
    // $meets = Meets::simplePaginate(10);
    // $data = compact('meets');
    return view('content.score.score-panel');
    // return view('content.score.score-panel', ['data' => $meets]);
  }

  public function showScorepanel()
  {
    $athletes['data'] = Scoresheet::all();
    // $athletes['data'] = Athletes::all();
    return view('content.score.score-panel-data', $athletes);
  }

  public function updateScore(Request $res)
  {
    $post = $res->all();
    $id = $post['row_id'];
    $score_row = Scoretable::find($id);
    if(!is_null($score_row)){
      $update = Scoretable::where('id', $id)
      ->update([$post['col'] => $post['val']]);
        $data['status']= $update;
    }
    $athletes['data'] = Scoresheet::all();
    // $athletes['data'] = Athletes::all();
    return view('content.score.score-panel-data', $athletes);
    // return json_encode($data);
  }

  public function showScorepanelApp()
  {
    $athletes['data'] = Scoresheet::all();
    // $athletes['data'] = Athletes::all();
    return json_encode($athletes);
    // return json_encode($data);
  }
}
