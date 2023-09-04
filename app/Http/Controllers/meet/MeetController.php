<?php

namespace App\Http\Controllers\meet;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MeetController extends Controller
{
  public function index()
  {
    return view('content.layouts-example.layouts-container');
  }

  public function addMeet()
  {
    $json =
      [
          "id" => 1,
          "name" => "Meet 1",
          "location"=> "Mumbai",
          "from_date"=> "2023-09-04",
          "to_date"=> "2023-09-07",
          "scoring"=> 1,
          "created_by"=> "12345",
          "modified_by"=> "",
          "created_at"=> null,
          "updated_at"=> null
    ];
    // return view('content.layouts-example.layouts-container');
  }


  public function getMeet()
  {
    $meet = DB::table('meets')->get();
    return $meet;
    // return view('content.layouts-example.layouts-container');
  }


}
