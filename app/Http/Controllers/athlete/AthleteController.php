<?php

namespace App\Http\Controllers\athlete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
  public function index()
  {
    return view('content.layouts-example.layouts-container');
  }

  public function addAthlete()
  {
    echo "here";
    // return view('content.layouts-example.layouts-container');
  }
}
