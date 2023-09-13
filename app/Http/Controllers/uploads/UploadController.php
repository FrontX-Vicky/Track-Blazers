<?php

namespace App\Http\Controllers\uploads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
      return view('content.uploads.upload');
    }
}
