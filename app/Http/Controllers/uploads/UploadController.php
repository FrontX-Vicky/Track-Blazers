<?php

namespace App\Http\Controllers\uploads;

use App\Http\Controllers\Controller;
use App\Models\Uploads;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
      $uploads = Uploads::simplePaginate(5);
    // $data = compact('meets');
      return view('content.uploads.manage-uploads' , ['data' => $uploads]);
    }

    public function upload_view()
    {
      return view('content.uploads.upload');
    }


    public function upload(Request $res)
    {
      $filename = time() . "-tb." . $res->file('file')->getClientOriginalExtension();
      $ext =  $res->file('file')->getClientOriginalExtension();
      $original_filename = $res->file('file')->getClientOriginalName();
      $file_path = $res->file('file')->storeAs('documents/batch_csv', $filename);

      $uploads = new Uploads;
      $uploads->original_name = $original_filename;
      $uploads->storage_name = $filename;
      $uploads->ext	 =  $ext;
      $uploads->path = $file_path;
      $uploads->save();
      // return $uploads;
      // return redirect()->route('meets');

      return redirect()->route('manage-uploads');
      // return view('content.uploads.manage-uploads');
    }

    public function get_uploads(){
        $uploads = Uploads::all();
        $uploads = compact('uploads');
        return view('content.batch.batch-dropdown',  $uploads);
    }
}
