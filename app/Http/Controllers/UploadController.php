<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\File;

class UploadController extends Controller
{
    private $SF = '/public/img/';
    public function uploadimage(Request $request) {


        $file = new File();
        if ($request->hasfile('img')) {
            // use some funcs
            $Complte_filename = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($Complte_filename, PATHINFO_FILENAME);
            $format_of_file_name = $request->file('img')->getClientOriginalExtension();
            // write costom file name 
            $myimgname = str_replace(' ', '_', $filename).'_' .rand(). '_' . time().'.'. $format_of_file_name;
            // dd($myimgname);
            // save file in storage
            $path = $request->file('img')->storeAs($this->SF, $myimgname);
            // dd($path);
            $file->name = $myimgname;
            $file->format = $format_of_file_name;
            $file->size = $request->file('img')->getSize();
            $file->tags = $request->tag;
            // $file->save();
            // return Response()->json('ok',200);
        }

        if($file->save())
        {
            return Response()->json([
                'status' => 'success',
                'message' => 'File uploaded successfully',
            ],200);
        }else{
            return Response()->json([
                'status' => 'error',
                'message' => 'File upload failed',
            ], 400);
        }

    }
}
