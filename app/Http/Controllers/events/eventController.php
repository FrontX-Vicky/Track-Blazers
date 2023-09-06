<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class eventController extends Controller
{
  public function index()
  {
    return view('content.events.create-event');
  }





}
