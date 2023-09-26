<?php

namespace App\Http\Controllers\meet;

use App\Http\Controllers\Controller;
use App\Models\Athletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Meets;
use App\Models\Uploads;

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


  public function getMeet()
  {
     $meets['data'] = Meets::all();
     return json_encode($meets);
  }

  public function insertAthletes(Request $req)
  {
     $data = $req->all();
     $meet = Meets::find($data['meet_id']);
     $file = Uploads::find($data['file_id']);
     $athletes = [];
     $counter = 30001;

    //  echo storage_path().'/app/'.$file->path;
     $file_path = storage_path().'/app/'.$file->path;exit;
    //  $file_path = "C:/xampp/htdocs/tb-admin/storage/app/".$file->path;
     if(($open = fopen($file_path, 'r')) !== FALSE){
         while(($row = fgetcsv($open)) !== FALSE){
          // $athletes[] = $row;
            $athlete = new Athletes;
            $athlete->athlete_uid = $meet->id.$counter;
            $athlete->fname = $row[2];
            $athlete->lname	 = $row[1];
            $athlete->affiliation	 = $row[4];
            $athlete->gender = $row[3];
            $athlete->event_id = $row[5];
            $athlete->meet_id = $meet->id;
            $athlete->batch_id = $file->id;
            $athlete->created_by = "48077";
            $athlete->created_at = date("Y-m-d h:i:s");
            // echo $athlete;
            $athlete->save();
            $counter++;
         }
         fclose($open);
     }
     return json_encode($athletes);
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

  public function generate_password(){

    $random_password = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    return $random_password;
  }

}
