<?php

namespace App\Http\Controllers\score;

use App\Http\Controllers\Controller;
use App\Models\Athletes;
use App\Models\Events;
use App\Models\Scoresheet;
use App\Models\Scoretable;
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
    $options = ['', 'X', '-', 'DNS', 'r'];
    if ($req['event_no'] != '' && isset(session()->all()['meet_id']) && !empty(session()->all()['meet_id'])) {
      $meet_id = session()->all()['meet_id'];
      $athletes['score_data'] = Scoresheet::where('event_no', '=', $req['event_no'])->where('meet_id', '=',  $meet_id)->simplePaginate(10);
      // echo($athletes->toSql());
    } else {

      // $athletes['score_data'] = Scoresheet::simplePaginate(8);
    }
    $athletes['options'] = $options;
    // dd($athletes['data']);
    // $athletes['data'] = Athletes::all();
    return view('content.score.score-panel-data', $athletes);
  }

  public function updateScore(Request $req)
  {
    $post = $req->all();
    $id = $post['row_id'];
    $score_row = Scoretable::find($id);
    // echo($score_row);
    if (!is_null($score_row)) {
      $update = Scoretable::where('id', $id)
        ->update([$post['col'] => $post['val']]);
      $data['status'] = $update;
    }

    $this->calculations($req);
    // exit;
    return $this->showScorepanel($req);
  }

  public function showScorepanelApp()
  {
    $athletes['data'] = Scoresheet::all();
    // $athletes['data'] = Athletes::all();
    return json_encode($athletes);
    // return json_encode($data);
  }

  public function calculations($req)
  {

    if ($req['event_no'] != '' && isset(session()->all()['meet_id']) && !empty(session()->all()['meet_id'])) {
      $meet_id = session()->all()['meet_id'];
      $athletes = Scoresheet::where('event_no', '=', $req['event_no'])->where('meet_id', '=',  $meet_id)->get()->toArray();
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
          $update = Scoretable::where('id', $athlete['id'])->update(['best_3' => $max]);
          // print_r($athlete);
        } else {
          $update = Scoretable::where('id', $athlete['id'])->update(['best_3' => '']);
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
          $update = Scoretable::where('id', $athlete['id'])->update(['best_5' => $max]);
          // print_r($athlete);
        } else {
          $update = Scoretable::where('id', $athlete['id'])->update(['best_5' => '']);
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

          // Check if there are any numeric values
          if (!empty($numeric_values)) {
            $max = max($numeric_values);
          } else {
            $max = 'NM';
          }
          $update = Scoretable::where('id', $athlete['id'])->update(['best_all' => $max]);
          // print_r($athlete);
        } else {
          $update = Scoretable::where('id', $athlete['id'])->update(['best_all' => '']);
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
        $score_row =  Scoretable::find($athlete['id'])->toArray();
        if ($score_row['best_3'] != 'NM' && $score_row['best_3'] != '') {
          array_push($top_8, [$score_row['id'], $counter, $score_row['best_3']]);
          $counter++;
        }
      }
    }

    $top_8 = $this->sort_positions($top_8);
    foreach ($top_8 as $i => $position) {
      $update = Scoretable::where('id', $position[0])->update(['position_after_3' => ($i + 1)]);
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
        $score_row =  Scoretable::find($athlete['id'])->toArray();
        if ($score_row['best_5'] != 'NM' && $score_row['best_5'] != '') {
          array_push($top_8, [$score_row['id'], $counter, $score_row['best_5']]);
          $counter++;
        }
      }
    }

    $top_8 = $this->sort_positions($top_8);
    foreach ($top_8 as $i => $position) {
      $update = Scoretable::where('id', $position[0])->update(['position_after_5' => ($i + 1)]);
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
        $score_row =  Scoretable::find($athlete['id'])->toArray();
        if ($score_row['best_all'] != 'NM' && $score_row['best_all'] != '') {
          array_push($top_8, [$score_row['id'], $counter, $score_row['best_all']]);
          $counter++;
        }
      }
    }

    $top_8 = $this->sort_positions($top_8);
    foreach ($top_8 as $i => $position) {
      $update = Scoretable::where('id', $position[0])->update(['position_final' => ($i + 1)]);
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
