<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Meets;
use App\Models\Events;
use App\Models\Scoresheet_v1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/authenticat_meet', function(Request $req){
  $request = $req->all();
  $data = [];
  if(isset($request['meet_login_id'])){
    if(isset($request['password'])){
      $meet = Meets::where('meet_login_id', '=',  $request['meet_login_id'])->where('password', '=',  $request['password'])->get();
      // $meet = Meets::where('meet_login_id', '=',  $request['meet_login_id'])->get();
      $meet = $meet->toArray()[0];
      $events = Events::where('meet_id', '=', $meet['id'])->get();
      $athletes = Scoresheet_v1::where('meet_id', '=',  $meet['id'])->get();
      $data['meet'] = $meet;
      $data['events'] = $events;
      $data['athletes'] = $athletes;
      $data['error'] = 0;
      $data['msg'] = "success";
    }else{
      $data['error'] = 1;
      $data['msg'] = "password not present in request";
    }
  }else{
    $data['error'] = 1;
    $data['msg'] = "meet_login_id not present in request";
  }
  // dd($request);
  return json_encode($data);
});

Route::post('/get_meet_events', function(Request $req){
  $request = $req->all();
  $events = Events::where('meet_id', '=',  $request['meet_id'])->get();
  return $events;
});

Route::post('/server_data_update', function(Request $req){
  $request = $req->all();
  // $events = Events::where('meet_id', '=',  $request['meet_id'])->get();

  return $request;
});
