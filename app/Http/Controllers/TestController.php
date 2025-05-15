<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function list(){
        return response()->json([
            'message' => '1'
        ]);
    }
}
