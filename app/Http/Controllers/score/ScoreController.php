<?php

namespace App\Http\Controllers\score;

use App\Http\Controllers\Controller;
use App\Models\Athletes;
use App\Models\Events;
use App\Models\RoundHeightLevel;
use App\Models\Scoresheet_v1;
use App\Models\Scoresheet_v2;
use App\Models\Scoretable_v1;
use App\Models\Scoretable_v2;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
  public function index()
  {
    $events = [];
    if (isset(session()->all()['meet_id']) && !empty(session()->all()['meet_id'])) {
      $meet_id = session()->all()['meet_id'];
      $events = Events::where('meet_id', '=', $meet_id)->get();
    }
    // dd($events);
    $data = compact('events');
    return view('content.score.score-panel', $data);
    // return view('content.score.score-panel', ['data' => $meets]);
  }

  public function showScorepanel(Request $req)
  {

    if ($req['event_id'] != '' && isset(session()->all()['meet_id']) && !empty(session()->all()['meet_id'])) {
      $meet_id = session()->all()['meet_id'];
      $event_type = Events::where('id', '=', $req['event_id'])->where('meet_id', '=',  $meet_id)->get()->toArray()[0]['event_type'];


      if($event_type <= 6){
        $options = ['', 'X', '-', 'DNS', 'r'];
        $data['score_data'] = Scoresheet_v1::where('event_id', '=', $req['event_id'])->where('meet_id', '=',  $meet_id)->get();
        $data['options'] = $options;
        return view('content.score.score-panel-data-one', ['data' => $data]);
      }else if($event_type <= 8){
        $options = ['', 'O', '-', 'X'];
        $data['score_data'] = Scoresheet_v2::where('event_id', '=', $req['event_id'])->where('meet_id', '=',  $meet_id)->get();
        $data['height_level'] = RoundHeightLevel::where('event_id', '=', $req['event_id'])->get();
        $data['options'] = $options;
        return view('content.score.score-panel-data-two', ['data' => $data]);
      }
    } else {
      return 'No Score Board assigned to Event!';
    }
  }

  public function updateScore(Request $req)
  {
    $post = $req->all();
    $id = $post['row_id'];

    if($post['version'] == '1'){
      $score_row = Scoretable_v1::find($id);
      // echo($score_row);
      if (!is_null($score_row)) {
        $update = Scoretable_v1::where('id', $id)
          ->update([$post['col'] => $post['val']]);
        $data['status'] = $update;
      }
    }else if($post['version'] == '2'){
      $score_row = Scoretable_v2::find($id);
      // echo($score_row);
      if (!is_null($score_row)) {
        $update = Scoretable_v2::where('id', $id)
          ->update([$post['col'] => $post['val']]);
        $data['status'] = $update;
      }
    }

    $this->calculations($req);
    // exit;
    return $this->showScorepanel($req);
  }

  public function updateHeight(Request $req)
  {
    $event = RoundHeightLevel::where('event_id', '=', $req['event_id'])->where('id', '=', $req['row_id'])->update([$req['col'] => $req['val']]);
    return $this->showScorepanel($req);
  }

  public function showScorepanelApp()
  {
    $athletes['data'] = Scoresheet_v1::all();
    // $athletes['data'] = Athletes::all();
    return json_encode($athletes);
    // return json_encode($data);
  }

  public function calculations($req)
  {

    if ($req['event_no'] != '' && isset(session()->all()['meet_id']) && !empty(session()->all()['meet_id'])) {
      $meet_id = session()->all()['meet_id'];
      $athletes = Scoresheet_v1::where('event_no', '=', $req['event_no'])->where('meet_id', '=',  $meet_id)->get()->toArray();
      // print_r($athletes);

      foreach ($athletes as $athlete) {
        if ($athlete['r_1'] != '0' && $athlete['r_2'] != '0' && $athlete['r_3'] != '0') {
          $numeric_values = [];
          if (is_numeric($athlete['r_1'])) {
            $numeric_values[] = (float)$athlete['r_1'];
          }

          if (is_numeric($athlete['r_2'])) {
            $numeric_values[] = (float)$athlete['r_2'];
          }

          if (is_numeric($athlete['r_3'])) {
            $numeric_values[] = (float)$athlete['r_3'];
          }

          // Check if there are any numeric values
          if (!empty($numeric_values)) {
            $max = max($numeric_values);
          } else {
            $max = 'NM';
          }
          $update = Scoretable_v1::where('id', $athlete['id'])->update(['best_3' => $max]);
          // print_r($athlete);
        } else {
          $update = Scoretable_v1::where('id', $athlete['id'])->update(['best_3' => '']);
        }
      }

      $this->assign_positions_after_3($athletes);

      foreach ($athletes as $athlete) {
        if ($athlete['r_1'] != '0' && $athlete['r_2'] != '0' && $athlete['r_3'] != '0' && $athlete['r_4'] != '0' && $athlete['r_5'] != '0') {
          $numeric_values = [];
          if (is_numeric($athlete['r_1'])) {
            $numeric_values[] = (float)$athlete['r_1'];
          }

          if (is_numeric($athlete['r_2'])) {
            $numeric_values[] = (float)$athlete['r_2'];
          }

          if (is_numeric($athlete['r_3'])) {
            $numeric_values[] = (float)$athlete['r_3'];
          }

          if (is_numeric($athlete['r_4'])) {
            $numeric_values[] = (float)$athlete['r_4'];
          }

          if (is_numeric($athlete['r_5'])) {
            $numeric_values[] = (float)$athlete['r_5'];
          }

          // Check if there are any numeric values
          if (!empty($numeric_values)) {
            $max = max($numeric_values);
          } else {
            $max = 'NM';
          }
          $update = Scoretable_v1::where('id', $athlete['id'])->update(['best_5' => $max]);
          // print_r($athlete);
        } else {
          $update = Scoretable_v1::where('id', $athlete['id'])->update(['best_5' => '']);
        }
      }

      $this->assign_positions_after_5($athletes);

      foreach ($athletes as $athlete) {
        if ($athlete['r_1'] != '0' && $athlete['r_2'] != '0' && $athlete['r_3'] != '0' && $athlete['r_4'] != '0' && $athlete['r_5'] != '0' && $athlete['r_6'] != '0') {
          $numeric_values = [];
          if (is_numeric($athlete['r_1'])) {
            $numeric_values[] = (float)$athlete['r_1'];
          }

          if (is_numeric($athlete['r_2'])) {
            $numeric_values[] = (float)$athlete['r_2'];
          }

          if (is_numeric($athlete['r_3'])) {
            $numeric_values[] = (float)$athlete['r_3'];
          }

          if (is_numeric($athlete['r_4'])) {
            $numeric_values[] = (float)$athlete['r_4'];
          }

          if (is_numeric($athlete['r_5'])) {
            $numeric_values[] = (float)$athlete['r_5'];
          }

          if (is_numeric($athlete['r_6'])) {
            $numeric_values[] = (float)$athlete['r_6'];
          }

          // Check if there are any numeric values
          if (!empty($numeric_values)) {
            $max = max($numeric_values);
          } else {
            $max = 'NM';
          }
          $update = Scoretable_v1::where('id', $athlete['id'])->update(['best_all' => $max]);
          // print_r($athlete);
        } else {
          $update = Scoretable_v1::where('id', $athlete['id'])->update(['best_all' => '']);
        }
      }

      $this->best_of_all($athletes);
    } else {
    }
  }

  public function assign_positions_after_3($athletes)
  {

    $poistion_after_3_count = 8;
    $top_8 = [];
    $counter = 1;

    foreach ($athletes as $athlete) {
      if ($counter <= $poistion_after_3_count) {
        $score_row =  Scoretable_v1::find($athlete['id'])->toArray();
        if ($score_row['best_3'] != 'NM' && $score_row['best_3'] != '') {
          array_push($top_8, [$score_row['id'], $counter, $score_row['best_3']]);
          $counter++;
        }
      }
    }

    $top_8 = $this->sort_positions($top_8);
    foreach ($top_8 as $i => $position) {
      $update = Scoretable_v1::where('id', $position[0])->update(['position_after_3' => ($i + 1)]);
    }
    // print_r($top_8);exit;
  }

  public function assign_positions_after_5($athletes)
  {

    $poistion_after_5_count = 8;
    $top_8 = [];
    $counter = 1;

    foreach ($athletes as $athlete) {
      if ($counter <= $poistion_after_5_count) {
        $score_row =  Scoretable_v1::find($athlete['id'])->toArray();
        if ($score_row['best_5'] != 'NM' && $score_row['best_5'] != '') {
          array_push($top_8, [$score_row['id'], $counter, $score_row['best_5']]);
          $counter++;
        }
      }
    }

    $top_8 = $this->sort_positions($top_8);
    foreach ($top_8 as $i => $position) {
      $update = Scoretable_v1::where('id', $position[0])->update(['position_after_5' => ($i + 1)]);
    }
    // print_r($top_8);exit;
  }

  public function best_of_all($athletes)
  {

    $poistion_after_5_count = 8;
    $top_8 = [];
    $counter = 1;

    foreach ($athletes as $athlete) {
      if ($counter <= $poistion_after_5_count) {
        $score_row =  Scoretable_v1::find($athlete['id'])->toArray();
        if ($score_row['best_all'] != 'NM' && $score_row['best_all'] != '') {
          array_push($top_8, [$score_row['id'], $counter, $score_row['best_all']]);
          $counter++;
        }
      }
    }

    $top_8 = $this->sort_positions($top_8);
    foreach ($top_8 as $i => $position) {
      $update = Scoretable_v1::where('id', $position[0])->update(['position_final' => ($i + 1)]);
    }
    // print_r($top_8);exit;
  }

  public function sort_positions($rows)
  {
    usort($rows, function ($a, $b) {
      return $b[2] - $a[2]; // Compare based on the values in index 2 in descending order
    });
    return $rows;
  }
}
