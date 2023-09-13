<?php

namespace App\Http\Controllers\score;

use App\Http\Controllers\Controller;
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
}
