<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Meets;
use App\Models\Events;

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
  $meet = Meets::where('meet_login_id', '=',  $request['meet_login_id'])->where('password', '=',  $request['password'])->get();
  return $meet;
});

Route::post('/get_meet_events', function(Request $req){
  $request = $req->all();
  $events = Events::where('meet_id', '=',  $request['meet_id'])->get();
  return $events;
});
