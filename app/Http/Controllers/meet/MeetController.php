<?php

namespace App\Http\Controllers\meet;

use App\Http\Controllers\Controller;
use App\Models\Athletes;
use App\Models\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Meets;
use App\Models\Scoretable;
use App\Models\Uploads;

class MeetController extends Controller
{
  public function index()
  {
    $meets = Meets::where('park', '=' ,'0')->simplePaginate(10);
    // $data = compact('meets');
    return view('content.meet.manage-meets', ['data' => $meets]);
  }

  public function createMeet()
  {
    return view('content.meet.createmeet');
  }

  public function insertMeet(Request $req)
  {

    $meet_login_id = $this->generate_login_id();
    // echo $meet_login_id;exit;
    $password = $this->generate_password();

    $meets = new Meets;
    $meets->name = $req['name'];
    $meets->location = $req['location'];
    $meets->from_date	 = $req['from_date'];
    $meets->to_date = $req['to_date'];
    $meets->scoring = isset($req['scoring']) ? $req['scoring']: '0';
    $meets->meet_login_id = $meet_login_id;
    $meets->password = $password;
    $meets->created_by = "48077";
    $meets->created_at = date("Y-m-d h:i:s");
    $meets->save();
    return redirect()->route('meets');
  }

  public function updateMeet(Request $req)
  {
    $req = $req->all();
    $meet = Meets::find($req['id']);
    $meet->name = $req['name'];
    $meet->location = $req['location'];
    $meet->from_date	 = $req['from_date'];
    $meet->to_date = $req['to_date'];
    $meet->scoring = isset($req['scoring']) ? $req['scoring']: '0';
    $meet->save();

    return redirect()->route('meets');
  }

  public function editMeet($id = null)
  {
    if($id != null){
      $meet = Meets::find($id)->toArray();
      return view('content.meet.meet-edit', ['meet' => $meet]);
    }else{
      return view('content.pages.pages-misc-error');
    }
  }

  public function getMeet()
  {
     $meets['data'] = Meets::where('park', '=', '0')->all();
     return json_encode($meets);
  }

  public function insertAthletes(Request $req)
  {
     $data = $req->all();
     $meet = Meets::find($data['meet_id']);
     $events = Events::where('meet_id', '=' ,$data['meet_id'])->get();
     $eventsArray = $events->toArray();
     $response = [];
     if(count($eventsArray)==0){
        return $response = ['error' => 1, 'msg' => 'No event found!'] ;
     }
     $file = Uploads::find($data['file_id']);
     $events_arr = [];
    $gender_arr = ['O', 'M', 'F'];
    foreach($eventsArray as $event){
      $events_arr[$event['event_id']] = $event;
    }
    // print_r($events_arr);exit;
    $gender_missmatch = [];
    $event_unuvailable = [];
    //  echo storage_path().'/app/'.$file->path;
     $file_path = storage_path().'/app/'.$file->path;
    //  $file_path = "C:/xampp/htdocs/tb-admin/storage/app/".$file->path;
     if(($open = fopen($file_path, 'r')) !== FALSE){
         while(($row = fgetcsv($open)) !== FALSE){
          // $athletes[] = $row;
          if(array_key_exists($row[5], $events_arr)){
            $event = $events_arr[$row[5]];
            if($gender_arr[$event['gender']] ==  $row[3]){
              // $meet = Athletes::where('meet_id', "=", $data['meet_id']);
              $athlete = new Athletes;
              $athlete->athlete_uid = $row[0];
              $athlete->fname = $row[2];
              $athlete->lname	 = $row[1];
              $athlete->affiliation	 = $row[4];
              $athlete->gender = $row[3];
              $athlete->event_id = $row[5];
              $athlete->meet_id = $meet->id;
              $athlete->batch_id = $file->id;
              $athlete->created_by = "48077";
              $athlete->created_at = date("Y-m-d h:i:s");
              // echo $athlete;exit;
              $athlete->save();
              // $counter++;
              // echo $athlete;exit;
              if($athlete->id){
                $score_data = new Scoretable;
                $score_data->athlete_id = $athlete->id;
                // $score_data->created_by = "48077";
                // $score_data->created_at = date("Y-m-d h:i:s");
                $score_data->save();
              }
            }else{
               $response = ['error' => 0, 'msg' => 'Athletes added successfully'];
               $response['data']['gender_missmatch'][$event['name']][] = $row;
            }
          } else {
              //  $response['data']['event_unuvailable'][$row[5]][] = $row;
          }
        }
      }
      // $response['data']['events'] = $events_arr;
      fclose($open);
     return json_encode($response);
  }

  public function generate_login_id(){

    $random_number = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
    $random_alphabets = chr(rand(65, 90)) . chr(rand(65, 90)); // ASCII values for uppercase letters

    // Create the random text
    $random_text = "TSA" . $random_number . $random_alphabets;

    $meet_login_id = Meets::where('meet_login_id', '=',  $random_text);
    // echo $meet_login_id->count();exit;
    if($meet_login_id->count()){
      $this->generate_login_id();
    }else{
       return $random_text;
    }

  }

  public function deleteMeet($id = null){
    if($id != null){
      $meet = Meets::where('id', $id)->update(['park' => '1']);
    }
    return $this->index();
  }

  public function generate_password(){

    $random_password = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    return $random_password;
  }

  public function setGlobalMeet(Request $req){
      $meet_id =  $req->all()['id'];
      $req->session()->put('meet_id', $meet_id);
      return json_encode(['data' =>  $meet_id, 'status'=>1, 'msg'=> 'Meet id set successfully!']);
  }
}
